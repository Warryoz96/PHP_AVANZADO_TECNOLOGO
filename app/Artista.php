<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = "artists";
    protected $primaryKey = "ArtistId";
    public $timestamps = false;

    //Relacion Artista - Albumes
    //Relación 1-m Utilizando hasMany: Metodo Eloquent
    public function albumes(){
        return $this->hasMany('App\Album','ArtistId');
    }
}
