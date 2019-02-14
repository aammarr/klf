<?php


use Illuminate\Database\Seeder;
use App\User;
use App\Events;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        // User Table Data
        /*for($i = 0; $i < 1000; $i++) {
        	App\User::create([
	            'email' => $faker->email,
	            'password' => $faker->password,
	            'full_name' => $faker->name,
	            'phone_number' => $faker->name,
	        ]);
	    }*/

        // User Event Data
	    /*for($i = 0; $i < 50; $i++) {
        	App\Events::create([
	            'event_name' => $faker->name,
	            'event_date' => $faker->date,
	            'event_startTime' => '2019-01-01',
	            'event_duration' => '2',
	            'event_venue' => $faker->address,
	            'event_speaker' => '1',
	            'event_sponsor' => '3',
	            'event_topic' => $faker->text,
	            'event_details' => $faker->text,
	            'event_avatar' => $faker->imageUrl,
	            'created_at' => $faker->date(),
	        ]);
	    }*/
    }
}
