<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;
use App\Siswa;
use App\Rayon;
use App\Rombel;
use App\Jadwal;
use App\detail;


class SetController extends Controller
{

	public function timeZone($location)
	{
		return date_default_timezone_set($location);
	}

	public function index()
	{
    $this->timeZone('Asia/Jakarta');
		$date = date("Y-m-d");
		
    $user = DB::table('siswa')->where('user_id',auth()->user()->id)->first();
    
    $oya = DB::table('jadwal')->where([
    	['siswa_id',$user->id],
    	['tanggal',$date],
    ])->orderBy('tanggal', 'desc')->paginate(20);
    
    $data = DB::table('siswa')
            ->join('rayon', 'siswa.rayon_id', '=', 'rayon.id')
            ->join('rombel', 'siswa.rombel_id', '=', 'rombel.id')
            ->select('siswa.*','rayon.nama_rayon','rombel.nama_rombel')
            ->where('user_id',auth()->user()->id)
            ->first();
   		$hari = date ("D");
 
		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
	 
			case 'Mon':			
				$hari_ini = "Senin";
			break;
	 
			case 'Tue':
				$hari_ini = "Selasa";
			break;
	 
			case 'Wed':
				$hari_ini = "Rabu";
			break;
	 
			case 'Thu':
				$hari_ini = "Kamis";
			break;
	 
			case 'Fri':
				$hari_ini = "Jumat";
			break;
	 
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			
			default:
				$hari_ini = "Tidak di ketahui";		
			break;
		}
   
    return view('set.index',compact('oya','data','hari_ini','date'));
   }

   public function create(Request $request)
   {
        $request->validate(['nama_kegiatan' => 'min:4|required',
           
            'waktu_mulai'=>'required',
            'waktu_selesai'=>'required',
            'mapel'=> 'required'
          ]);
   		  $this->timeZone('Asia/Jakarta');
		    $date = date("Y-m-d");
        $konvert_mulai = date("H:i", strtotime($request->waktu_mulai));

        $konvert_selesai = date("H:i", strtotime($request->waktu_selesai));    

        $siswa = DB::table('siswa')->where('user_id',Auth()->user()->id)->first();
        $temp = Siswa::findOrFail($siswa->id);

         $jadwal = Jadwal::create([
          'siswa_id' => $temp->id,
          'nama_kegiatan' => $request->nama_kegiatan,
          'tanggal' => $date,
          'waktu_mulai' => $konvert_mulai,
          'waktu_selesai' => $konvert_selesai,
          'mapel' =>$request->mapel
        ]);


        $request->request->add(['jadwal_id' => $jadwal->id]);
        $detail = Detail::create([  
          'jadwal_id' => $request->jadwal_id,
        	'siswa_id' => $temp->id,
        	'nama_kegiatan' => $request->nama_kegiatan,
        	'tanggal' => $date,
        	'waktu_mulai' => $konvert_mulai,
        	'waktu_selesai' => $konvert_selesai,
        	'mapel' =>$request->mapel,
        	'status' => 'merah'
        ]);

        return redirect('/set')->with('sukses','Jadwal Berhasil Di Input');
   }


  

   

}
