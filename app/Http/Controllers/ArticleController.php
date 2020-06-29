<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleCollection;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
       return ArticleCollection::collection(Article::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article=new Article;
        $article->title=$request->title;
        $article->description=$request->details;
        $article->save();
        return response([
            'data'=>new ArticleResource($article) 
        ],Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return new ArticleResource($article); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return response([
            'data'=>new ArticleResource($article) 
        ],Response::HTTP_CREATED);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
         return response(null,Response::HTTP_NO_CONTENT);
    }
}
