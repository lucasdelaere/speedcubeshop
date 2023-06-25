<?php

namespace Database\Seeders;

use App\Models\type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ["1x1", "2x2", "3x3", "4x4", "5x5", "6x6", "7x7", "8x8", "9x9", "10x10", "Cuboid", "Pyraminx", "Megaminx"];

        foreach ($types as $type) {
            Type::create([
                "name" => $type,
            ]);
        }
    }
}
