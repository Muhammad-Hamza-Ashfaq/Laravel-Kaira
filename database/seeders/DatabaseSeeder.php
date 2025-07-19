<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\Storage;
use Illuminate\Support\Facades\File;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        // ensuring the directories exist
        Storage::disk('public')->makeDirectory('products');
        Storage::disk('public')->makeDirectory('categories'); // it creates categories folder inside the public directory of storage folder!

        // copying the default image if not already there!

        // setup default product image
        $defaultImagePath = public_path('images/default-product.jpg');
        $destination = storage_path('app/public/products/default-product.jpg');

        if (!File::exists($destination))
        {
            File::copy($defaultImagePath, $destination);
        }

        // setup default category image
        // $defaultCategoryImage = 'categories/default-category.jpg';
        // if (Storage::exists("public/{$defaultCategoryImage}"))
        // {
        //     $categorySource = public_path('images/default-category.jpg');
        //     Storage::put("public/{$defaultCategoryImage}", file_get_contents($categorySource));
        // }

        // setup default category image
        $defaultCategoryImagePath = public_path('images/default-category.jpg');
        $categoryDestination = storage_path('app/public/categories/default-category.jpg');

        if (!File::exists($categoryDestination)) {
        File::copy($defaultCategoryImagePath, $categoryDestination);
        }
        $this->call(
        [
            CategorySeeder::class,
            ProductSeeder::class,
        ]
    );

    }
}
