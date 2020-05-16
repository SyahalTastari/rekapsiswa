<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Siswa;
use App\Rayon;
use App\Rombel;
use App\Wali;
class SiswaController extends Controller
{
    public function index()
    {

        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $siswa = Siswa::all();

        
        return view('siswa.index', compact('siswa','rayon','rombel'));
    }


    public function create(Request $request)
    {
        $request->validate([
                    'nis' => 'required|unique:siswa,nis',
                    'nama' => 'required',
                    'jenis_kelamin' => 'required',
                    'id_rombel' => 'required',
                    'id_rayon' => 'required',
                ]);

    	$user =  new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->username = $request->nis;
        $user->password = bcrypt($request->nis);
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());
        return redirect('/siswa')->with('sukses','Data Berhasil Di Input');
    }


    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        return view('siswa.edit', compact('siswa','rayon','rombel')); 
    }

    public function update(Request $request, $id)
    {
         $request->validate([
                    'nama' => 'required',
                    'jenis_kelamin' => 'required',
                    'id_rombel' => 'required',
                    'id_rayon' => 'required',
                ]);

            $siswa = Siswa::findOrFail($id);
            
            $user = DB::table('users')->where('name',$siswa->nama)->first();
            
            $users = User::findOrFail($user->id);
            
            $users->update([
                'name' => $request->nama,
            ]);

            $siswa->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_rombel' => $request->id_rombel,
                'id_rayon' => $request->id_rayon,
            ]);

        return redirect('/siswa')->with('sukses','Data Berhasil Dirubah');
    }


     public function delete($id)
    {
        $siswa = Siswa::find($id);
        $user = User::findOrFail($siswa->user_id);
        $siswa->delete();
        $user->delete();
        return redirect('/siswa')->with('sukses','berhasil dihapus');
    }

}
