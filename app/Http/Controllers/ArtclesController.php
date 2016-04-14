<?php

namespace App\Http\Controllers;

use App\Article;

//use Illuminate\Http\Request;
//use Illuminate\Http;
use App\Tag;
use Carbon\Carbon;
use Request;
use Auth;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Session\Session;

class ArtclesController extends Controller
{
    /**
     * ArtclesController constructor.
     */


    public function __construct()
    {
        $this->middleware('auth',['only' => 'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //

       // return auth::user()->name;

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
       // if(Auth::guest())
       // {
      //      return redirect('articles');
       // }
        $tags = Tag::lists('name');

        return view('articles.create')->with('tag',$tags );
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
        //$Article = new Article($request->all());
       // auth::user()->articles()->save(new Article($request->all()));

       $input = $request->all();
        $Article = new Article;
        $Article->title = $input['title'];
        $Article->body= $input['body'];
        $Article->published_at= $input['published_at'];
        $Article->user_id= Auth::user()->id;
        $Article->saveOrFail();

        \Session::flash('flash_message', 'you have create new artcile');
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
