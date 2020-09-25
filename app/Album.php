<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    Protected $table="Albums";
    protected $primaryKey = "AlbumId";
    public $timestamps= false;
}
