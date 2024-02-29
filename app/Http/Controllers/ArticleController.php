<?php
// app/Http/Controllers/ArticleController.php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function home()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(6); 
        return view('home', compact('articles'));
    }



    // public function index()
    // {
    //     $articles = Article::orderBy('id','desc')->paginate(10);
    //     return view('dashboard.articles.index', compact('articles'));
    // }

    public function index()
    {
        // Mendapatkan nama pengguna yang sedang masuk
        $userName = Auth::user()->name;

        // Mendapatkan ID pengguna yang sedang masuk
        $userId = Auth::id();

        // Mengambil semua artikel yang terkait dengan ID pengguna yang sedang masuk
        $articles = Article::where('user_id', $userId)->paginate(10);

        // Mengembalikan view dengan data artikel yang sesuai, serta nama pengguna untuk judul
        return view('dashboard.articles.index', compact('articles', 'userName'));
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('dashboard.articles.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // Mendapatkan ID pengguna yang sedang masuk
        $userId = Auth::id();

        // Validasi dan simpan artikel
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Simpan artikel dengan user_id yang sesuai
        $article = new Article();
        $article->user_id = $userId;
        $article->title = $request->title;
        $article->imglink = $request->imglink;
        $article->content = $request->content;
        $article->save();

        return redirect()->route('dashboard.articles.index')->with('success','Article created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function show(Article $article)
    {
        return view('dashboard.articles.show',compact('article'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function edit(Article $article)
    {
        return view('dashboard.articles.edit',compact('article'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'imglink' => 'required',
            'content' => 'required',
        ]);
        
        $article->fill($request->post())->save();

        return redirect()->route('dashboard.articles.index')->with('success','Article Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Article  $article
    * @return \Illuminate\Http\Response
    */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('dashboard.articles.index')->with('success','Article has been deleted successfully');
    }
}
