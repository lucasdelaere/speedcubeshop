<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "is_active" => 1,
            "role_id" => 1,
            "first_name" => "Lucas",
            "last_name" => "De Laere",
            "email" => "lucas.delaere@hotmail.com",
//            "photo_id" => 1,
            "password" => bcrypt(12345678),
            "email_verified_at" => Carbon::now()->format("Y-m-d H:i:s"), //so we can log in
            "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            "updated_at" => Carbon::now()->format("Y-m-d H:i:s"),
        ]);
        DB::table("users")->insert([
            "is_active" => 1,
            "role_id" => 2,
            "first_name" => "Tom",
            "last_name" => "Vanhoutte",
            "email" => "tom@hotmail.com",
//            "photo_id" => 1,
            "password" => bcrypt(12345678),
            "email_verified_at" => Carbon::now()->format("Y-m-d H:i:s"),
            "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            "updated_at" => Carbon::now()->format("Y-m-d H:i:s"),
        ]);
        User::factory()
            ->count(50)
            ->create();
    }
}
