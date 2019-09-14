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
        // $this->call(UsersTableSeeder::class);

        $user = new \App\User;
        $user->name = "Puji";
        $user->email = "apayah90@gmail.com";
        $user->password = Hash::make("terserah90");
        $user->api_token = str_random(100);

        $user->save();
    }
}
