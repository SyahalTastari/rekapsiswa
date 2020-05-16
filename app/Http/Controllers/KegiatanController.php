<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use DB;
use App\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class KegiatanController extends Controller
{
    public function index(Request $request)
    {	
    	 $this->timeZone('Asia/Jakarta');
         $date = date("Y-m-d"); // 2017-02-01
         $time = date("H:i:s"); // 12:31:20
         if ($request->has('cari')) {
         	
    		$siswa = DB::table('siswa')->where(['user_id' => auth()->user()->id])->first();
    		

         	
         	$detail = Detail::where([
         	['tanggal', 'LIKE', '%'.$request->cari.'%'],
         	['siswa_id', '=', $siswa->id],
         	])->orderBY('tanggal', 'desc')
         	->get();
         	
         	
        	

         }else{
    	
    	 $siswa = DB::table('siswa')->where(['user_id' => auth()->user()->id])->first();
    	 

    	 $detail = DB::table('detail')->where(['siswa_id' => $siswa->id])
    	 					->orderBy('tanggal', 'desc')
    	 					->get();

    	 }
    	
    	 
    	return view('kegiatan.index',compact('detail'));
    }


    public function lihat($id)
    {
    	
    		$detail = Detail::findOrFail($id);

         	$lihat = Detail::where([
         	['tanggal', '=', $detail->tanggal ],
         	['siswa_id', '=', $detail->siswa_id],
         	])->orderBY('waktu_mulai', 'asc')
         	->get();
         	

    	return view('kegiatan.lihat',compact('lihat'));
    }

    public function timeZone($location)
    {
        return date_default_timezone_set($location);
    }

}
