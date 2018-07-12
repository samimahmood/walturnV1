<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class MovieUser extends Model
{
    use SyncsWithFirebase;


    protected $table = 'movie_user';

    protected $fillable = [
        'user_id', 'movie_id'
    ];

}
