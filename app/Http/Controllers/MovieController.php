<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Movie::with('category','genre','country')->orderBy('id','ASC')->get();
        return view('admincp.movie.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $country = Country::pluck('title','id');
        return view('admincp.movie.form', compact('category', 'country', 'genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $view = 0;
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->name_eng = $data['name_eng'];
        $movie->slug = $data['slug'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->description = $data['description'];
        $movie->time = $data['time'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $movie->video = $data['video'];
        $movie->view = 0;

        //them hinh anh
        $get_image = $request->file('image');

        //  them hinh anh
            if($get_image){
                $get_name_image = $get_image->getClientOriginalName(); //tenhinhanh.jpg
                $name_image = current(explode('.',$get_name_image)); //[0] => tenhinhanh . [1] => jpg , lay mang dau tien
                $new_image = $name_image.rand(0,9999).'.'. $get_image->getClientOriginalExtension(); // random tranh trung hinh anh, getClientOriginalExtension lay duoi mo rong
                $get_image->move('uploads/movie/', $new_image); // copy hinh anh va tao ten moi
                $movie->image = $new_image;
            }
        // $get_video = $request->file('video');
        // if($get_video){
        //     $get_name_video = $get_video->getClientOriginalName(); //tenhinhanh.jpg
        //     $name_video = current(explode('.',$get_name_video)); //[0] => tenhinhanh . [1] => jpg , lay mang dau tien
        //     $new_video = $name_video.rand(0,9999).'.'. $get_video->getClientOriginalExtension(); // random tranh trung hinh anh, getClientOriginalExtension lay duoi mo rong
        //     $get_video->move('uploads/video/', $new_video); // copy hinh anh va tao ten moi
        //     $movie->video = $new_video;
        // }
            $movie->save();
        return redirect()->back();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $country = Country::pluck('title','id');
        $movie = Movie::find($id);
        return view('admincp.movie.form', compact('category', 'country', 'genre', 'movie'));
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
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->name_eng = $data['name_eng'];
        $movie->slug = $data['slug'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->description = $data['description'];
        $movie->time = $data['time'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $movie->video = $data['video'];

        //them hinh anh
        $get_image = $request->file('image');

        //  them hinh anh
            if($get_image){
                if(!empty($movie->image)){
                    unlink('uploads/movie/'.$movie->image);
                }
                $get_name_image = $get_image->getClientOriginalName(); //tenhinhanh.jpg
                $name_image = current(explode('.',$get_name_image)); //[0] => tenhinhanh . [1] => jpg , lay mang dau tien
                $new_image = $name_image.rand(0,9999).'.'. $get_image->getClientOriginalExtension(); // random tranh trung hinh anh, getClientOriginalExtension lay duoi mo rong
                $get_image->move('uploads/movie/', $new_image); // copy hinh anh va tao ten moi
                $movie->image = $new_image;
            }
            // $get_video = $request->file('video');
            // if($get_video){
            //     if(!empty($movie->video)){
            //         unlink('uploads/video/'.$movie->video);
            //     }
            //     $get_name_video = $get_video->getClientOriginalName(); //tenhinhanh.jpg
            //     $name_video = current(explode('.',$get_name_video)); //[0] => tenhinhanh . [1] => jpg , lay mang dau tien
            //     $new_video = $name_video.rand(0,9999).'.'. $get_video->getClientOriginalExtension(); // random tranh trung hinh anh, getClientOriginalExtension lay duoi mo rong
            //     $get_video->move('uploads/video/', $new_video); // copy hinh anh va tao ten moi
            //     $movie->video = $new_video;
            // }
            //     $movie->save();
            $movie->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if(!empty($movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        // if(!empty($movie->video)){
        //     unlink('uploads/video/'.$movie->video);
        // }
        $movie->delete();
        return redirect()->back();
    }


    public function view($id){
        $data = Movie::find($id);

        return view('admincp.movie.view', compact('data'));
    }
}
