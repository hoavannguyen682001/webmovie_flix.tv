<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Category;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home(){
        $auth = Auth::all();
        $phim_hot = Movie::where('phim_hot',1)->where('status',1)->get();
        $view = Movie::orderBy('view','DESC')->take(10)->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $category_home = Category::with('movie')->orderBy('id','DESC')->where('status',1)->get();
        return view('pages.home', compact('category','genre','country', 'category_home','phim_hot', 'auth','view'));
    }
    public function search(){
        $keywords = $_GET['keywords_submit'];
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $view = Movie::orderBy('view','DESC')->take(10)->get();
        $search_movie = Movie::where('title','like','%'.$keywords.'%')->paginate(8);

        return view('pages.search', compact('category','genre','country','search_movie','keywords','view'));
    }

    public function ajaxSearch(){
        $result_search =  Movie::search()->get();
        return view('pages.ajaxSearch', compact('result_search'));
    }

    public function category($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $cate_slug = Category::where('slug',$slug)->first();
        $movie = Movie::where('category_id',$cate_slug->id)->paginate(8);
        $view = Movie::orderBy('view','DESC')->take(10)->get();
        return view('pages.category', compact('category','genre','country', 'cate_slug','movie','view'));
    }
    public function genre($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $genre_slug = Genre::where('slug',$slug)->first();
        $movie = Movie::where('genre_id',$genre_slug->id)->paginate(8);
        $view = Movie::orderBy('view','DESC')->take(10)->get();
        return view('pages.genre', compact('category','genre','country', 'genre_slug','movie','view'));
    }
    public function country($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $contry_slug = Country::where('slug',$slug)->first();


        $movie = Movie::where('country_id',$contry_slug->id)->paginate(8);


        $view = Movie::orderBy('view','DESC')->take(10)->get();
        return view('pages.country', compact('category','genre','country', 'contry_slug','movie','view'));
    }
    public function movie($slug, Request $request){
        $data = Episode::with('movie')->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $movie = Movie::with('category','genre','country')->where('slug', $slug)->where('status',1)->first();

        // $movie_slug = Movie::where('slug', $slug)->first();
        $related= Movie::with('category','genre','country')->where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();

        $url = $request->url();
        $image = url('public/uploads/movie'.'/'.$movie->image);

        $episode_first = Episode::with('movie')->orderBy('id','ASC')->where('movie_id', $movie->id)->first();
        $rating = Rating::where('movie_id', $movie->id)->avg('rating');
        $rating = round($rating);


        return view('pages.movie',compact('image','url','rating','category','genre','country','movie','related','data','episode_first'));
    }

    public function episode($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();


        $movie = Episode::where('slug', $slug)->first();
        $view_movie = Movie::find($movie->movie_id);
        $view = Movie::orderBy('view','DESC')->take(10)->get();

        $movie_slug = Movie::with('episode')->where('id',$movie->movie_id)->first();
        $movie_slug->increment('view');
        $movie_slug->save();


        $movie_relate = Movie::with('category','genre','country')->where('slug', $movie_slug->slug)->where('status',1)->first();
        $related= Movie::with('category','genre','country')->where('category_id', $movie_relate->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$movie_slug->slug])->get();

        $episode = Episode::with('movie')->where('slug', $slug)->where('movie_id',$movie->movie_id)->first();

        $episode_all = Episode::with('movie')->orderBy('id','ASC')->where('movie_id', $movie->movie_id)->get();


        return view('pages.episode', compact('genre', 'category', 'country','view','episode','episode_all','related','view_movie'));
    }
}
