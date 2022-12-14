<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Category as CategoryAlias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::factory(6)->create();
    }
}
