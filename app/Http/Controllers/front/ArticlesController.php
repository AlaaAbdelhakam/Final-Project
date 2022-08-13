<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Articles;
use App\Comments;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function index(){
        $articles = DB::table('articles')->join('category', 'articles.category_id', '=', 'category.id')
        ->select('articles.*', 'category.name')->get();

        return view('front.index')->with('articles',$articles);
    }
    public function article($id){
        $article = DB::table('articles')->join('category', 'articles.category_id', '=', 'category.id')
        ->select('articles.*', 'category.name')->where('articles.id',$id)->first();

        $comments = DB::table('comments')->where('article_id',$id)->get();
        return view('front.articles')->with('article',$article)->with('comments',$comments);
    }
    public function category($id){
        $articles = DB::table('articles')->where('category_id',$id)->get();

        return view('front.category')->with('articles',$articles);
    }
    public function comment_insert(Request $request,$id){
        Comments::create([
            'comment' => $request->comment,
            'article_id' => $id
        ]);


        return redirect()->back();
    }

    public function search(Request $request){
        $articles = DB::table('articles')->join('category', 'articles.category_id', '=', 'category.id')
        ->select('articles.*', 'category.name')->where('articles.title','like','%'.$request->find.'%')
        ->Orwhere('articles.content','like','%'.$request->find.'%')->get();
        return view('front.search')->with('articles',$articles);
    }

}
