<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Movie;
use App\MovieUser;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/movies/home', 'MovieController@index')->name('movies.home');

Route::get('/movie/create' , 'MovieController@create')->name('movie.create');
Route::post('/movie/store' , 'MovieController@store')->name('movie.store');

Route::get('/movie/subscribe/{id}' , 'MovieController@subscribe')->name('movie.subscribe');
Route::get('/movie/unsubscribe/{id}' , 'MovieController@unsubscribe')->name('movie.unsubscribe');


Route::get('/movies/playlist', 'MovieController@playlist')->name('movies.playlist');


Route::get('/create' , function ()
{

//    $movie = new MovieUser(['user_id' => '1']);
//    $movie->save();

//        $movie = MovieUser::find(7);
//    $movie->delete();




//        $user = User::find(1);

        $movie = new Movie(['name' => 'Sanju']);
        $movie->save();


//        $user->movies()->save($movie);


        $movieUser = new MovieUser(['movie_id' => $movie->id, 'user_id' => Auth::id()]);
        $movieUser->save();



});
