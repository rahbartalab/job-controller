<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        // \App\Models\User::factory(10)->create();
//
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
//
//        $this->call([
//            ApplicantSeeder::class
//        ]);

        DB::table('foods')->insert([
            [
                'name' => 'peperoni pizza'
            ],
            [
                'name' => 'koobide'
            ],
            [
                'name' => 'omlet'
            ],
            [
                'name' => 'pasta'
            ]
        ]);

        DB::table('restaurants')->insert([
            [
                'name' => 'hossein'
            ]
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'fast food'
            ],
            [
                'name' => 'pizza'
            ],
            [
                'name' => 'iranian'
            ]
        ]);

        DB::table('categoriables')->insert([
            [
                'category_id' => 1,
                'categoriable_type' => Food::class,
                'categoriable_id' => 1
            ],
            [
                'category_id' => 1,
                'categoriable_type' => Restaurant::class,
                'categoriable_id' => 1
            ]
        ]);

    }
}
