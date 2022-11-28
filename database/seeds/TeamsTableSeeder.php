<?php

use App\Team;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker; 
class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $value) {
            DB::table('users')->insert([
                'name'=>$faker->name,
                'email'=>$faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            $randomNumber = rand(123, 789);

            $team = Team::factory()->create([
                'name' => "Tienda $randomNumber",
            ]);

            /*
            $director = User::factory()->create([
                'name'           => "adones evangelista",
                'email'          => "adones@gmail.com",
                'password'       => bcrypt('$2y$10$hc4VRoj6boBg7XBFPM0wiuJMJRoM9z/.i6iUq8ZH3.0zPhbQ030MK'),
                'team_id'        => $team->id,
                'remember_token' => null,
            ]);
            $director->roles()->sync(2);

            $doctor = User::factory()->create([
                'name'           => "jude suares",
                'email'          => "jude@gmail.com",
                'password'       => bcrypt('$2y$10$mo2628I/B0hAEgxXcT1F/OiCprXKgEdNQk4rKvPQy7Xqu39e3XmsG'),
                'team_id'        => $team->id,
                'remember_token' => null,
            ]);
            $doctor->roles()->sync(2);*/
        }
    }
}
