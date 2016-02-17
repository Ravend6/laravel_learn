<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('tags')->truncate();
        // DB::table('tags')->insert([
        //     [
        //         'name' => 'php',
        //     ],
        //     [
        //         'name' => 'sport',
        //     ],
        //     [
        //         'name' => 'js',
        //     ]
        // ]);
        // $table = 'article_tag';
        // DB::statement('DROP table `'.$table.'`');
        // DB::table('tags')->truncate();
        // DB::table('article_tag')->delete();
        factory(App\Tag::class, 10)->create();
    }
}
