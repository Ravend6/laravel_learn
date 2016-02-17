<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Article;

class CreateArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create random article';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $article = new Article;
        $article->user_id = 1;
        $article->title = 'Article #' . rand(1, 100);
        $article->slug = str_slug($article->title, '-');
        $article->body = rand(1, 100) . ' lorem';
        $article->save();
        echo "{$article->title} success created!" . PHP_EOL;
    }
}
