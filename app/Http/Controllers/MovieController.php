<?php

namespace App\Http\Controllers;

use App\Movie;
use App\MovieUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return view ( 'movieshome', compact('movies') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('addmovie');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();


        if ($file = $request->file('image'))
        {
            $name = time() . $file->getClientOriginalName();

            $file->move('images' , $name);

//            $photo = Image::create(['file' => $name]);

            $input['image'] = $name;
        }

        Movie::create($input);


        return redirect(route('movies.home'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }


    public function subscribe($id)
    {

        $user_favorites = DB::table('movie_user')
            ->where('user_id', '=', Auth::user()->id)
            ->where('movie_id', '=', $id)
            ->first();

        if (is_null($user_favorites))
        {
            // It does not exist - add to favorites button will show

            $movieUser = new MovieUser(['movie_id' => $id, 'user_id' => Auth::id()]);
            $movieUser->save();

            return redirect(route('movies.playlist'));

        }
        else {
            // It exists - remove from favorites button will show


            return redirect(route('movies.playlist'));
        }
    }

    public function unsubscribe($id)
    {

//        $user = Auth::user()->id;
//
//        $movie_id = MovieUser::where([
//            ["user_id", $user], ["movie_id" , $id]
//        ])->pluck('id');


        $movieUser= MovieUser::where('movie_id', $id)->where('user_id',Auth::id() )->first();


        $movieUser->delete();

            return redirect(route('movies.playlist'));

    }

    public function playlist()
    {

        $user = Auth::user()->id;


        $movie_user = MovieUser::where([
            ["user_id", $user],
        ])->pluck('movie_id');

        $movies = Movie::whereIn('id', $movie_user)->get();


        return view ( 'moviesplaylist', compact('movies') );

    }




}
