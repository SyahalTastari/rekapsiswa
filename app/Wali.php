<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    protected $table = 'wali';
    protected $fillable = [
    	'user_id',
    	'siswa_id',
    	'orang_tua',
    	'jenis_kelamin',
    	'alamat',
    	'telepon'
    ];


    public function siswa()
    {
    	return $this->hasOne('App\Siswa');
    }
}
