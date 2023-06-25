<?php

namespace Database\Seeders;

use App\Models\brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ["Calvin's puzzle", "Dayan", 'DianSheng', "GAN", "MoFang JiaoShi", "MoYu", "QiYi", "SpeedCubeShop", "YuXin"];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
                'description' => fake()->paragraph(3, true),
            ]);
        }
    }
}
