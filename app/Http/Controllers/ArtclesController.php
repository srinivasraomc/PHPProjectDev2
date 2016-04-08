<?php

namespace App\Http\Controllers;

use App\Article;

//use Illuminate\Http\Request;

use Carbon\Carbon;
use Request;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests;

class ArtclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //$Articles = Article::latest()->get();
        $Articles = Article::latest('published_at')->Published()->get();
        return view('articles.index')->with('article', $Articles);
        //return $Articles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreateArticleRequest $request)
    {
        //
        $input = $request->all();
        $Article = new Article;
        $Article->title = $input['title'];
        $Article->body= $input['body'];
        $Article->published_at= $input['published_at'];
        //$Article->save();
        $Article->saveOrFail();
        return redirect('articles');
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
        $ArticlesID = Article::findOrFail($id);

        return view('articles.show')->with('articleid', $ArticlesID );

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
        $articleEdit =  Article::findOrFail($id);

        return view ('articles.edit')->with('articleEdit', $articleEdit  );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateArticleRequest $request, $id)
    {

        $ArticlesID = Article::findOrFail($id);

        $ArticlesID->update($request->all());
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
        //
    }
}
