<?php

use Illuminate\Database\Seeder;

use App\News;
use Carbon\Carbon;

class Nlist extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::insert([
            'title' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, repellendus.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Amet exercitationem facilis incidunt repellat repellendus sed. Ab aliquid blanditiis, 
             cupiditate, dignissimos distinctio doloribus enim ipsum molestiae obcaecati officiis quae vitae?',
            'author' => 1,
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
