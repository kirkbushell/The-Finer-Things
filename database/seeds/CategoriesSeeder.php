<?php

use FinerThings\Domain\Categories\Data\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
	public function run()
    {
        Category::firstOrCreate(['title' => 'Cigars']);
        Category::firstOrCreate(['title' => 'Wine']);
        Category::firstOrCreate(['title' => 'Scotch & Whisky']);
    }
}
