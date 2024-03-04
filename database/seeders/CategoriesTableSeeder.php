<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category_name' => 'Conferences', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Workshops', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Seminars', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Networking Events', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Trade Shows', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Music Concerts', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Art Exhibitions', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Film Screenings', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Sporting Events', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Charity Events', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Food Festivals', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Technology Events', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Fashion Shows', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Cultural Festivals', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Health & Wellness Events', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Education Fairs', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Community Gatherings', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['category_name' => 'Virtual Events', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
