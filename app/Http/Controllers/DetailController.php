<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use App\Jadwal;
use App\Siswa;
use Illuminate\Support\Facades\Crypt;
use File;
use Image;
use DB;
use Excel;
use App\Exports\RekapExport;
class DetailController extends Controller
{
    public function index()
    {
      $this->timeZone('Asia/Jakarta');
      $date = date("Y-m-d");
    	 $user = DB::table('siswa')->where('user_id',auth()->user()->id)->first();
       $detail = DB::table('detail')->where([
        ['siswa_id',$user->id],
        ['tanggal',$date],
       ])->orderBy('tanggal','asc')->paginate(20);

    	return view('detail.index',compact('detail','date'));
    }

    public function update(Request $request, $id)
   {

    $request->validate([
      'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

      $this->timeZone('Asia/Jakarta');
      $date = date("Y-m-d"); // 2017-02-01
      $time = date("H:i:s"); // 12:31:20
   		$detail = Detail::findOrFail($id);
      $hapus = Jadwal::findOrFail($detail->jadwal_id);
   		$hapus->delete();
            if ($request->hasFile('photo')) {
                $photo = $this->saveFile($detail->nama_kegiatan, $request->file('photo'));
            }
            $detail->update([
                'photo' => $photo,
                'status' => 'kuning',
                'updated_at' => $date.' '.$time
            ]);

            
           

         return redirect('/detail')->with('sukses','Data Berhasil Di Input');
   }

   private function saveFile($name, $photo)
    {
        $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();
        $path = public_path('uploads');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        } 
        Image::make($photo)->save($path . '/' . $images);
        return $images;
    }

     public function delete($id)
   {

    $jadwal = Jadwal::find($id);
    $find = DB::table('detail')->where('jadwal_id',$id)->first();
    $delete = Detail::find($find->id);
    $delete->delete();
    $jadwal->delete();
    return redirect('/set')->with('sukses','Jadwal Berhasil Di Hapus');
   }

   public function timeZone($location)
    {
        return date_default_timezone_set($location);
    }

    public function rekap()
    {
      $this->timeZone('Asia/Jakarta');
      $date = date("Y-m-d");
        $detail = Detail::orderBy('tanggal','DESC')->get();

      return view('rekap.index',compact('detail','date'));
    }

    public function lihat($id)
    {
      $this->timeZone('Asia/Jakarta');
      $date = date("Y-m-d");
      $detail = Detail::find($id);
      $data =   DB::table('detail')->where('tanggal',$detail->tanggal)->get();


     
      $semua = DB::table('siswa')
            ->join('detail', 'siswa.id', '=', 'detail.siswa_id')
            ->join('rayon','siswa.rayon_id','=','rayon.id')
            ->join('rombel','siswa.rombel_id', '=','rombel.id')
            ->select('siswa.*','detail.*','rayon.*','rombel.*')
            ->where('detail.tanggal',$detail->tanggal)
            ->orderBy('siswa.nama','asc')
            ->get();
     

      return view('rekap.semua',compact('date','semua')); 
    }

    public function exportExcel()
    {

      return Excel::download(new RekapExport, 'semua.xlsx');
    }
}
