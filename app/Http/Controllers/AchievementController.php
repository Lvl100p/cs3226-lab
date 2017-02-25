<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display the achievements page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('achievements');
    }

    /**
     * Show the students who have the requested achievement and tier.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudents(Request $request)
    {
        $requestedAchvId = $request->input('achievement');
        $achv = \App\Achievement::find($requestedAchvId);
        $achvName = $achv->name;
        $requestedTier = $request->input('tier');
        $maxTier = $achv->max_tier;

        // Check that the requested tier does not exceed the maximum allowable tier for that achievement
        if ($requestedTier > $maxTier) {
            $msg = "Achievement '$achvName' does not have a tier of '$requestedTier'.";
            return view('achievements', ['msg' => $msg, 'defaultAchv' => $requestedAchvId, 'defaultTier' => $requestedTier]);
        }

        // Get the students with the requested achievement id and tier
        $earned = \DB::table('earned')->where('achievement_id', '=', $request->input('achievement'))
            ->where('tier', '=', $request->input('tier'))
            ->get();

        $students = array();
        foreach ($earned as $earn) {
            $students[] = \App\Student::find($earn->student_id);
        }

        return view('achievements', ['students' => $students, 'defaultAchv' => $requestedAchvId, 'defaultTier' => $requestedTier]);
    }
}
