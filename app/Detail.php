<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'detail';
    protected $primaryKey = 'id';
    protected $fillable = ['jadwal_id','siswa_id','nama_kegiatan','tanggal','waktu_mulai','mapel','waktu_selesai','photo','status'];

    public function siswa()
    {
    	return $this->belongsTo(Siswa::class);
    }

}
