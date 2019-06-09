<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Response;
use Validator;

use App\Article;

use App\Http\Resources\ArticleResource;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at')->get();
        return ArticleResource::collection($articles);
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
        $rules = [
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:30'
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return Response::json([
                'error' => $validation->errors()
            ], 400);
        }
        $article = Article::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);
        return Response::json([
            'data' => new ArticleResource($article)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        if (empty($article)) {
            return Response::json([
                
            ], 200);
        }
        return Response::json([
            'data' => new ArticleResource($article)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:30'
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return Response::json([
                'error' => $validation->errors()
            ], 400);
        }
        Article::find($id)->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);
        $article = Article::find($id);
        return Response::json([
            'data' => new ArticleResource($article)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return Response::json([], 204);
    }
}
