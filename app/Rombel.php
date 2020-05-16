<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
     protected $table = 'rombel';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_rombel'];

    public function siswa()
    {
    	return $this->hasMany('App\Siswa');
    }
}
