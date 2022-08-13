<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Articles;
use App\Category;

class ArticlesController extends Controller
{
    public function index(){
        $articles = Articles::all();
        return view('articles.index')->with('articles',$articles); // table of articles
    }
    public function create(){
        $categories = Category::all();
        return view('articles.create')->with('categories',$categories);
    }

    public function insert(Request $request){

        $img = $request->img;
        $img_new = time() . $img->getClientOriginalName();
        $img->move('uploads/articles',$img_new);
        Articles::create([
            'title' => $request->title,
            'content' => $request->content,
            'img' => 'uploads/articles/'.$img_new,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('articles.index');
    }
    public function trash($id){
        $article = Articles::findOrFail($id);

        $article->delete();

        return redirect()->route('articles.index');
    }
    public function trashed(){
        $articles = Articles::onlyTrashed()->get();
        return view('articles.trashed')->with('articles',$articles); // show only trashed articles
    }
    public function restore($id){
        $articles = Articles::onlyTrashed()->where('id',$id);

        $articles->restore();

        return redirect()->route('articles.index');
    }

    public function remove($id){
        $articles = Articles::onlyTrashed()->where('id',$id);

        $articles->forceDelete();

        return redirect()->route('articles.index');
    }

    public function edit($id){
        $articles = Articles::findOrFail($id);
        $categories = Category::all();

        return view('articles.edit')->with('articles',$articles)->with('categories',$categories);
    }

    public function update(Request $request,$id){
        $articles = Articles::findOrFail($id);

        $articles->title = $request->title;
        $articles->content = $request->content;
        $articles->category_id = $request->category_id;
        if($request->img){
            $img = $request->img;
            $img_new = time() . $img->getClientOriginalName();
            $img->move('uploads/articles',$img_new);
            $articles->img = 'uploads/articles/'.$img_new;
        }
        $articles->save();

        return redirect()->route('articles.index');
    }
}
