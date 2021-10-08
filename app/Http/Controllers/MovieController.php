<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('client.movie', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::orderBy('title')->get();
        $categories = Category::get();
        return view('admin.movie', ['movies' => $movies, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->validate([
                'category_id' => 'required',
                'title' => 'required',
                'released_at' => 'required',
                'bought_at' => 'required',
            ]);

            $movie = Movie::create($data);
            return redirect('/movie/create');
        }

        catch(Exception $ex){
            $error = array(['error' => 'No se ha podido completar: '.$ex]);
            $movies = Movie::all();
            $categories = Category::get();
            return view('admin.movie', ['movies' => Movie::all(), 'categories' => Category::get(), 'error' => $error]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::where(['id' => $id])->first();
        $categories = Category::get();
        return view('admin.movie-update', ['movie' => $movie, 'categories' => $categories]);
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
        try{
            $data = $request->validate([
                'category_id' => 'required',
                'title' => 'required',
                'released_at' => 'required',
                'bought_at' => 'required',
            ]);

            $movie = Movie::where(['id' => $id])->update($data);
            return redirect('/movie/create');
        }

        catch(Exception $ex){
            $error = array(['error' => 'No se ha podido completar: '.$ex]);
            $movies = Movie::all();
            $categories = Category::get();
            return view('admin.movie', ['movies' => Movie::all(), 'categories' => Category::get(), 'error' => $error]);
        }
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
