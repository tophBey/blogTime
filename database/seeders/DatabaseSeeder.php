<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();


        // User::create([
        //     "name" => "Muhamad Arif",
        //     "email" => "muhmdarif@gmail.com",
        //     "password" => bcrypt("1234"),
        // ]);

        Category::create([
            "name" => "Web Programing",
            "slug" => "web-programing"
        ]);

        Category::create([
            "name" => "personal",
            "slug" => "personal"
        ]);

        Category::create([
            "name" => "Sport",
            "slug" => "Sport"
        ]);

        Post::factory(20)->create();

//         Post::create([
//             "title" => "Judul Pertama",
//             "user_id" => 1,
//             "category_id" =>1,
//             "slug" => "judul-pertama",
//             "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius magni pariatur asperiores eos, aspernatur distinctio
// cumque voluptatibus numquam deleniti consequatur incidunt. Quos cum esse ab quod placeat, praesentium",
//             "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius magni pariatur asperiores eos, aspernatur distinctio
// cumque voluptatibus numquam deleniti consequatur incidunt. Quos cum esse ab quod placeat, praesentium, at, reiciendis
// dolorum quibusdam molestias maiores commodi. Consectetur tenetur numquam inventore distinctio.",
//         ]);

//         Post::create([
//             "title" => "Judul Kedua",
//             "user_id" => 1,
//             "category_id" =>2,
//             "slug" => "judul-kedua",
//             "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius magni pariatur asperiores eos, aspernatur distinctio
// cumque voluptatibus numquam deleniti consequatur incidunt. Quos cum esse ab quod placeat, praesentium",
//             "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius magni pariatur asperiores eos, aspernatur distinctio
// cumque voluptatibus numquam deleniti consequatur incidunt. Quos cum esse ab quod placeat, praesentium, at, reiciendis
// dolorum quibusdam molestias maiores commodi. Consectetur tenetur numquam inventore distinctio.",
//         ]);

//         Post::create([
//             "title" => "Judul Ketiga",
//             "user_id" => 1,
//             "category_id" =>1,
//             "slug" => "judul-ketiga",
//             "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius magni pariatur asperiores eos, aspernatur distinctio
// cumque voluptatibus numquam deleniti consequatur incidunt. Quos cum esse ab quod placeat, praesentium",
//             "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius magni pariatur asperiores eos, aspernatur distinctio
// cumque voluptatibus numquam deleniti consequatur incidunt. Quos cum esse ab quod placeat, praesentium, at, reiciendis
// dolorum quibusdam molestias maiores commodi. Consectetur tenetur numquam inventore distinctio.",
//         ]);

//         Post::create([
//             "title" => "Judul Keempat",
//             "user_id" => 1,
//             "category_id" =>2,
//             "slug" => "judul-keempat",
//             "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius magni pariatur asperiores eos, aspernatur distinctio
// cumque voluptatibus numquam deleniti consequatur incidunt. Quos cum esse ab quod placeat, praesentium",
//             "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius magni pariatur asperiores eos, aspernatur distinctio
// cumque voluptatibus numquam deleniti consequatur incidunt. Quos cum esse ab quod placeat, praesentium, at, reiciendis
// dolorum quibusdam molestias maiores commodi. Consectetur tenetur numquam inventore distinctio.",
//         ]);
    }
}
