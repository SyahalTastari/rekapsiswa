<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'nis', 'nama', 'jenis_kelamin','rombel_id','rayon_id','wali_id'];


    public function rayon()
    {
    	return $this->belongsto('App\Rayon');
    }
    public function rombel()
    {
        return $this->belongsto('App\Rombel');
    }

    public function jadwal()
    {
    	return $this->hasMany(Jadwal::class);
    }

    public function detail()
    {
        return $this->hasMany(Detail::class);
    }

    public function wali()
    {
        return $this->belongsTo('App\Wali');
    }
}
