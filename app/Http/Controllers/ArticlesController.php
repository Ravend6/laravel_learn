<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Article;
use App\Tag;
use App\Lib\Message;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'update', 'destroy']]);
        // $this->middleware('admin:root', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $articles = Article::latest('published_at')->publisheda('<=')->get();
        // $articles = Article::latest('published_at')
        //     ->where('published_at', '<=', Carbon::now())->get();
        // $articles = Article::latest('published_at')->get();
        $articles = Article::latest()->paginate(5);
        // $articles = Article::orderBy('published_at', 'desc')->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ArticleRequest $request)
    {
        //Carbon::now();
        $article = \Auth::user()->articles()->save(new Article($request->all()));
        $tagIds = $request->input('tag_list');
        $article->tags()->attach($tagIds);
        // Article::create($request->all());
        // $request->session()->flash('flash_message', 'Article success created.');
        // \Session::flash('flash_message', 'Article success created.');
        // session()->flash('flash_message', 'Article success created.');
        return redirect('articles')
            ->with('flash_success', 'Article success created.');
    }

    // public function store(Request $request)
    // {
    //     //Carbon::now();
    //     $this->validate($request, [
    //         'title' => 'required|min:3',
    //         'body' => 'required',
    //         'published_at' => 'required|date',
    //     ]);
    //     Article::create($request->all());

    //     return redirect('articles');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        // if (Gate::denies('show-article', $article)) {
        //     abort(403, 'No Access.');
        // }

        // $this->authorize('show-article', $article);
        // if (auth()->user()->can('show-article', $article)) {
        //     // return 'You can';
        // }

        // dd($article->published_at);
        // dd($article->created_at->diffForHumans());
        // dd($article->created_at->format('Y-m'));
        // dd($article->created_at->year);
        // dd($article->created_at->addDays(10));
        // if (is_null($article)) {
        //     abort(404);
        // }

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        if (Gate::denies('update', $article)) {
            abort(403, Message::HTTP_403);
        }
        $tags = Tag::lists('name', 'id');
        // dd([1]);
        // dd($article->tagList->toArray());
        // dd($article->tagList);

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ArticleRequest $request, $id)
    {
        // $request->user()->can('update-article');

        $article = Article::findOrFail($id);
        $article->update($request->all());
        $article->tags()->sync($request->input('tag_list'));
        \Auth::user()->articles()->save($article);

        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        // Article::destroy($id);

        return redirect('articles');
    }
}
