<?php

use Illuminate\Database\Seeder;
use App\Achievement;
use App\Earned;

class EarnedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalAchv = DB::table('achievements')->count();
        $totalStud = DB::table('students')->count();

        // For each student, assign him a random number of achievements
        for ($i = 1; $i <= $totalStud; $i++) {
            $numAchvToHave = rand(0, $totalAchv);
            $achvIds = array();
            for ($j = 1; $j <= $numAchvToHave; $j++) {
                do { // Choose an achievement that the student doesn't have yet
                    $achvId = rand(1, $totalAchv);
                } while (in_array($achvId, $achvIds));
                $achvIds[] = $achvId;
                $tier = rand(1, App\Achievement::find($achvId)->max_tier); // Choose a random allowable tier
                $earned = new Earned;
                $earned->student_id = $i;
                $earned->achievement_id = $achvId;
                $earned->tier = $tier;
                $earned->save();
            }
        }

    }
}
