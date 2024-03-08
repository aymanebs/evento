<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            ['name' => 'Cinema'],
            ['name' => 'Theatre'],
            ['name' => 'Concert'],
            ['name' => 'Football'],
            ['name' => 'Speaking event'],
        ];

        foreach($categories as $category){

            Category::create($category);
            
        }
    }
}
