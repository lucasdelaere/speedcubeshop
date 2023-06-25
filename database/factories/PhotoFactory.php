<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $path = storage_path("app/public/products");
        /* writeable posts directory */
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
            // owner: rwx
            // group: rw
            // other: rw
        } else {
            /* standaard maximum 10 posts in directory */
            $files = glob($path . "/*");
            if (count($files) > 9) {
                Storage::disk("public")->deleteDirectory("products");
            }
        }
        return [
            "file" => function () {
                /* this is for images from the web */
                /*$imageUrl =
                    "https://source.unsplash.com/category/nature/640x480";
                $imageData = file_get_contents($imageUrl);
                $filename = "products/" . uniqid() . ".jpg";
                // writes locally and to db
                Storage::disk("public")->put($filename, $imageData);
                */

                // this is for local images
                $images = File::files(public_path('images/products'));
                $randomImage = $images[random_int(0, count($images) - 1)]->getRealPath();
                $filename = "products/" . uniqid() . ".jpg";
                Storage::disk("public")->put($filename, fopen($randomImage, 'r+'));

                return $filename;
            },
        ];
    }
}
