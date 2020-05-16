<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $fillable = ['siswa_id','nama_kegiatan','tanggal','waktu_mulai','mapel','waktu_selesai'];



    public function siswa()
    {
    	return $this->belongsTo(Siswa::class);
    }

}
