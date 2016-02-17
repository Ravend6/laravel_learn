<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 10)->create();


        for ($i=1; $i < 10 ; $i++) {
            DB::table('article_tag')->insert([
                'article_id' => $i,
                'tag_id' => rand(1, 10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
