<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //        DB::table("photos")->insert([
        //            "file" => time() . "batman.png",
        //            "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
        //            "updated_at" => Carbon::now()->format("Y-m-d H:i:s"),
        //        ]);
        Storage::disk("public")->deleteDirectory("products");
        Photo::factory()
            ->count(10)
            ->create();
    }
}
