<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use Gate;
use App\Lib\Message;

class TagsController extends Controller
{
    // public function show($tag)
    // {
    //     return $tag;
    // }

    public function show(Tag $tag)
    {
        // if (Gate::denies('update', $tag)) {
        //     abort(403, Message::HTTP_403);
        // }
        // $this->authorize('update', $tag);
        // if (auth()->user()->can('update', $tag)) {
        //     return 'You can';
        // }

        $articles = $tag->articles()->paginate(5);

        return view('articles.index', compact('articles'));
    }

    // public function show($name)
    // {
    //     $tag = Tag::where('name', $name)->firstOrFail();
    //     $articles = $tag->articles()->paginate(5);

    //     return view('articles.index', compact('articles'));
    // }
}
