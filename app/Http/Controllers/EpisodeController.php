<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Episode::with('movie')->orderBy('id','ASC')->get();
        return view('admincp.episode.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $movie = Movie::pluck('title','id');
        $list = Episode::all();
        return view('admincp.episode.form', compact('list','movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate  = $request->validate( [
            'slug' => ['required', 'string', 'max:255', 'unique:episodes'],
        ]);
        $data = $request->all();
        $episode = new Episode();
        $episode->movie_id = $data['movie_id'];
        $episode->slug = $data['slug'];
        $episode->episode = $data['episode'];
        $episode->link = $data['link'];

        $episode->save();
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

        $movie = Movie::pluck('title','id');
        $episode = Episode::find($id);
        return view('admincp.episode.form', compact('movie','episode'));
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
        $episode = Episode::find($id);
        $episode->movie_id = $data['movie_id'];
        $episode->slug = $data['slug'];
        $episode->episode = $data['episode'];
        $episode->link = $data['link'];

        $episode->save();
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
        //
    }
}
