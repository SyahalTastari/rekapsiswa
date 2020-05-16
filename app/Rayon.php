<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
     protected $table = 'rayon';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_rayon'];

    public function siswa()
    {
    	return $this->hasMany('App\Siswa');
    }
}
