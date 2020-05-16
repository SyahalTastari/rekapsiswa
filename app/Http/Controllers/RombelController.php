<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rombel;

class RombelController extends Controller
{
     public function index()
    {
    	$rombel = Rombel::all();

    	return view('rombel.index', compact('rombel'));
    }

    public function create(request $request)
    {
    	$request->validate([
    		'nama_rombel' => 'required|string',
    	]);

    	$siswa = Rombel::create($request->all());
    	return redirect('/rombel')->with('sukses','Berhasil Menambahkan rombel'.$siswa->nama_rombel);
    }

     public function edit($id)
    {

        $rombel = Rombel::find($id);
        return view('rombel.edit', compact('rombel')); 
    }

    public function update(Request $request, $id)
    {
         $request->validate([
                'nama_rombel' => 'required|string',             
            ]);

             $rombel = Rombel::findOrFail($id);
            $rombel->update([
                'nama_rombel' => $request->nama_rombel,               
            ]);
        return redirect('/rombel')->with('sukses','Berhasil Mengubah rombel '. $rombel->nama_rombel);
    }

    public function delete($id)
    {
       $rombel = Rombel::findOrFail($id);
        $rombel->delete();

        return redirect('/rombel')->with('sukses','Data Berhasil Dihapus');        
    }
}
