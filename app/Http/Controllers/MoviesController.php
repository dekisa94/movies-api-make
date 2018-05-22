<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Movie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\MessageBag;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->query('title')) {
            return Movie::search($request->query('title'));
        }elseif($request->query('take') && $request->query('skip')){
            return Movie::skip($request->query('skip'))->take($request->query('take'))->get();
        }else
        return Movie::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie();

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:movies,releaseDate',
            'director' => 'required',
            'duration' => 'required|numeric|between:1,500',
            'releaseDate' => 'required',
            'imageUrl' => 'URL'
        ]);
        if ($validator->fails()) {
            return new JsonResponse("Greska: Nepravilan unos parametara!");
        }

        $movie->title = $request->input('title');
        $movie->director = $request->input('director');
        $movie->imageUrl = $request->input('imageUrl');
        $movie->duration = $request->input('duration');
        $movie->releaseDate = $request->input('releaseDate');
        $movie->genre = $request->input('genre');

        $movie->save();
        return $movie;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::find($id);
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
        $movie = Movie::find($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:movies,releaseDate',
            'director' => 'required',
            'duration' => 'required|numeric|between:1,500',
            'releaseDate' => 'required',
            'imageUrl' => 'URL'
        ]);
        if ($validator->fails()) {
            return new JsonResponse("Greska: Nepravilan unos parametara!");
        }


        $movie->title = $request->input('title');
        $movie->director = $request->input('director');
        $movie->imageUrl = $request->input('imageUrl');
        $movie->duration = $request->input('duration');
        $movie->releaseDate = $request->input('releaseDate');
        $movie->genre = $request->input('genre');

        $movie->save();
        return $movie;
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
        $movie->delete();
        return new JsonResponse(true);
    }
}
