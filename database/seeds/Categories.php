<?php

use Illuminate\Database\Seeder;

use App\Category;
use Carbon\Carbon;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            'title' => 'First Category',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
