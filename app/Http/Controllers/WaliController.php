<?php

namespace App\Http\Controllers;

use App\Wali;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Siswa;
use App\Detail;
class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wali = Wali::all();

        return view('wali.index',compact('wali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
                    'orang_tua' => 'required',
                    'jenis_kelamin' => 'required',
                    'alamat' => 'required',
                    'telepon' => 'required|numeric|unique:wali,telepon',
                ]);

        $user =  new \App\User;
        $user->role = 'wali';
        $user->name = $request->orang_tua;
        $user->username = $request->orang_tua;
        $user->password = bcrypt($request->orang_tua);
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $wali = \App\wali::create($request->all());
        return redirect('/wali')->with('sukses','Data Berhasil Di Input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function show(Wali $wali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wali = Wali::find($id);
        return view('wali.edit', compact('wali')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
                    'orang_tua' => 'required',
                    'jenis_kelamin' => 'required',
                    'alamat' => 'required',
                ]);

            $wali = Wali::findOrFail($id);
            
            
            $user = DB::table('users')->where('name',$wali->orang_tua)->first();
            
            $users = User::findOrFail($user->id);
            
            $users->update([
                'name' => $request->orang_tua,
            ]);

            
            $wali->update($request->all());

        return redirect('/wali')->with('sukses','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wali  $wali
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $wali = wali::find($id);
        $user = User::findOrFail($wali->user_id);
        $wali->delete();
        $user->delete();
        return redirect('/wali')->with('sukses','berhasil dihapus');
    }

    public function tambah(Request $request,$id)
    {
       
        $wali = Wali::whereNull('siswa_id')->get();
        $no = $id;
       
        return view('siswa.wali',compact('wali','no'));
    }

    public function add($no, $id)
    {
        $wali = Wali::find($no);
       
        $wali->update([
            'siswa_id' => $id
        ]);
        
        $siswa = Siswa::find($id);
        $siswa->update([
            'wali_id' => $wali->id
        ]);
        return redirect('/siswa');
    }

    public function validasi()
    {  
        $this->timeZone('Asia/Jakarta');
        $date = date("Y-m-d");

        $wali = DB::table('wali')->where('user_id',auth()->user()->id)->first();
        $siswa = DB::table('siswa')->where([
            ['wali_id','=',$wali->id]
        ])->first();
        
         $detail = DB::table('detail')->where([
           ['siswa_id','=',$siswa->id],
           ['tanggal','=',$date],
             ])->get();
        

        return view('wali.validasi',compact('detail','siswa','date'));
    }

    public function timeZone($location)
    {
        return date_default_timezone_set($location);
    }

    public function hijau($id)
    {
        $detail = Detail::find($id);
        
        $detail->update([
            'status' => 'hijau'
        ]);

        return redirect('/wali/validasi');
    }

}
