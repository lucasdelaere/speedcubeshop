<?php

namespace Database\Factories;

use App\Models\brand;
use App\Models\Photo;
use App\Models\type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brandIds = Brand::pluck("id")->toArray();
        $typeIds = Type::pluck("id")->toArray();
        $photoIds = Photo::pluck("id")->toArray();
        $name = fake()->sentence(4);
        $slug = Str::slug($name, '-');
        return [
            "brand_id" => fake()->randomElement($brandIds),
            "type_id" => fake()->randomElement($typeIds),
            "photo_id" => fake()->randomElement($photoIds),
            "name" => $name,
            "slug" => $slug,
            "description" => fake()->paragraph(10, true),
            "price" => rand(0, 10000) / 100,
            "size" => rand(50, 80),
            "weight" => rand(50, 100),
            "rating" => rand(0, 5),
        ];
    }
}
