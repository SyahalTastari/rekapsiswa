<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uji extends Model
{
     protected $table = 'uji';
    protected $primaryKey = 'id';
    protected $fillable = ['id_pengguna','skor','keterangan'];
}
