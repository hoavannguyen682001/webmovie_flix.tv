<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Episode;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home(){
        $phim_hot = Movie::where('phim_hot',1)->where('status',1)->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $category_home = Category::with('movie')->orderBy('id','DESC')->where('status',1)->get();
        return view('pages.home', compact('category','genre','country', 'category_home','phim_hot'));
    }
    public function category($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $cate_slug = Category::where('slug',$slug)->first();
        $movie = Movie::where('category_id',$cate_slug->id)->paginate(40);

        return view('pages.category', compact('category','genre','country', 'cate_slug','movie'));
    }
    public function genre($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $genre_slug = Genre::where('slug',$slug)->first();
        $movie = Movie::where('genre_id',$genre_slug->id)->paginate(40);

        return view('pages.genre', compact('category','genre','country', 'genre_slug','movie'));
    }
    public function country($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $contry_slug = Country::where('slug',$slug)->first();
        $movie = Movie::where('country_id',$contry_slug->id)->paginate(40);

        return view('pages.country', compact('category','genre','country', 'contry_slug','movie'));
    }
    public function movie($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $movie = Movie::with('category','genre','country')->where('slug', $slug)->where('status',1)->first();
        $related= Movie::with('category','genre','country')->where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();

        return view('pages.movie',compact('category','genre','country','movie','related'));
    }
    public function watch($id){
        $data = Movie::find($id);
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        return view('pages.watch', compact('data','genre', 'category', 'country'));
    }
     public function view($id){
        $data = Movie::find($id);

        return view('pages.watch', compact('data'));
    }
    public function episode($id){
        $data = Movie::find($id);

       return view('pages.episode');
    }
}
