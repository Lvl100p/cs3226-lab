<?php

use Illuminate\Database\Seeder;
use App\Message;
class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	$messagesCount = 10;
    	$studentsCount = DB::table('students')->count();

    	for ($i = 1; $i <= $messagesCount; $i++) {
    		$message = new Message();
    		$message->student_id = $studentsCount--;
    		$message->message = $faker->paragraph(3, true);
    		$message->save();
    	}
    }
}
