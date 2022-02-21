<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Création de 5 catégories
        $categories = Category::factory(5)->create();

        // Création de 10 utilisateurs, pour chaque utilisateur on crée entre 1 et 3 posts qui seront liés à
        // l'utilisateur, on récupère de manière aléatoire les catégories et on prend la première
        User::factory(10)->create()->each(function ($user) use ($categories) {
            Post::factory(rand(1, 3))->create([
                'user_id' => $user->id,
                'category_id' => ($categories->random(1)->first())->id
            ]);
         });
    }
}
