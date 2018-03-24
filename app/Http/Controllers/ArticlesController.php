<?php

namespace App\Http\Controllers;

use App\File;
use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category')
                            ->paginate(10);
        //dump($articles);
        return view('articles.index',[
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = File::all();
        $categories = Category::all();
        return view('articles.create', [
            'categories' => $categories,
            'files' => $files
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        // $article = new Article();
        // $article -> title = $request->title;
        // $article -> category_id = $request->category_id;
        // $article -> body = $request->body;
        // $article -> save();
        $article = Article::create($request->all());
        $article->files()->attach($request->get('files_id'));
        return redirect( route('articles.index') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $files = File::all();

       // dd($article->files()->get()->toArray());
        // $flatSelectedFiles = [];
        // $selectedFiles = $article->files()->get()->toArray();
        // foreach ($selectedFiles as $selectedFile) {
        //     $flatSelectedFiles[] = $selectedFile['id'];
        // }
        //dd($flatSelectedFiles);
        //$selectedFiles = $article->files()->pluck('id')->toArray()
        return view('articles.edit',
        ['article' => $article,
        'categories' => $categories,
        'flatSelectedFiles' => $article->files()->pluck('id')->toArray(),
        'files' => $files]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $request, Article $article)
    {
        // $article-> title = $request -> title;
        // $article-> category_id = $request -> category_id;
        // $article-> body = $request -> body;
        // $article-> save();
        $article->update($request->all());
        $article->files()->sync($request->get('files_id'));
        return redirect( route('articles.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect( route('articles.index') );
    }
}
