<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ArticlesController extends Controller
{
    public function postGenerateSlug(Request $request)
    {
        $title = $request->input('title');
        $slug = str_slug($title, "-");
        $count = Article::where('slug', $slug)->count();
        if ($count >= 1) {
            $slug .= '-1';
            if (Article::where('slug', $slug)->count() >= 1) {
                $slug .= bin2hex(openssl_random_pseudo_bytes(8));
            }
            return $slug;
        }
        return $slug;
    }
}
