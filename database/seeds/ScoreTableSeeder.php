<?php

use Illuminate\Database\Seeder;

class ScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$scores = ['0', '0.5', '1', '1.5','2','2.5','3','3.5','4'];	
    	$scoretypes = ['mc', 'tc', 'hw', 'bs', 'ks', 'ac'];
    	for($i = 1; $i < 5; $i++) {
    		for($studentid = 1; $studentid <= 50; $studentid++) {
    			for($scoretype = 0; $scoretype < 3; $scoretype++) {
    				$scoreSeed = rand(0, 8);
    				DB::table('scores')->insert([
    					'id' => $studentid,
    					'scoretype' => $scoretypes[$scoretype],
    					'week' => $i,
    					'score' => $scores[$scoreSeed]
    					]);
    			}
    		}
    	}
    	
    }
}
