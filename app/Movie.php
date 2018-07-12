<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class Movie extends Model
{
    use SyncsWithFirebase;


    protected $fillable = [
        'name', 'image', 'year','link','genre','image_link',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
