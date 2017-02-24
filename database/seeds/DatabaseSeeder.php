<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StudentsTableSeeder::class);
        $this->call(ScoreTableSeeder::class);
        $this->call(AchievementsTableSeeder::class);
        $this->call(EarnedTableSeeder::class);
    }
}
