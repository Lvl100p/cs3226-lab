<?php

use Illuminate\Database\Seeder;
use App\Achievement;

class AchievementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $achievement = new Achievement;
        $achievement->name = 'Speed demon';
        $achievement->description = 'Very quick in solving problems';
        $achievement->max_tier = 1;
        $achievement->save();

        $achievement = new Achievement;
        $achievement->name = 'Determined';
        $achievement->description = 'Doesn\'t give up easily';
        $achievement->max_tier = 1;
        $achievement->save();

        $achievement = new Achievement;
        $achievement->name = 'Creative';
        $achievement->description = 'Comes up with creative solutions';
        $achievement->max_tier = 2;
        $achievement->save();

        $achievement = new Achievement;
        $achievement->name = 'Skilful';
        $achievement->description = 'Skilled in tackling problems';
        $achievement->max_tier = 3;
        $achievement->save();

        $achievement = new Achievement;
        $achievement->name = 'Completionist';
        $achievement->description = 'Leaves nothing uncompleted'; 
        $achievement->max_tier = 6; 
        $achievement->save();
    }
}
