<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller


{   
    public function __construct(){
    $this->middleware('auth')->except(["index","detail"]);
    }

    public function index(){
        $articles=Article::all();
        return view('articles.index',["articles"=>$articles]);
    }

    public function detail($id){
        $article=Article::find($id);

        return view('articles.detail',["article"=>$article]);
    }

    public function delete($id){
        $article=Article::find($id);
        if(Gate::allows('article-delete',$article)){
            $article->delete();

            return redirect('/articles')->with('danger','Article Deleted');
        }
        return back()->with('error',"Unauthorized");
        
    }

    public function add(){
        $categories=Category::all();
        return view('articles.add',["categories"=>$categories]);
    }

    public function create(){

        $validator=validator(request()->all(),[
            "title"=>"required",
            'user_id'=>'required',
            "body"=>"required",
            "category_id"=>"required"
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $article=new Article;
        $article->title=request()->title;
        $article->body=request()->body;
        $article->category_id=request()->category_id;
        $article->user_id=auth()->id();
        $article->save();
        return redirect('/articles');
    }
}
