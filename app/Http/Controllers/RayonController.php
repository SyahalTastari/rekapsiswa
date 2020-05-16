<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rayon;


class RayonController extends Controller
{
    public function index()
    {
    	$rayon = Rayon::all();

    	return view('rayon.index', compact('rayon'));
    }

    public function create(request $request)
    {
    	$request->validate([
    		'nama_rayon' => 'required|string',
    	]);

    	$siswa = Rayon::create($request->all());
    	return redirect('/rayon')->with('sukses','Berhasil Menambahkan Rayon'.$siswa->nama_rayon);
    }

     public function edit($id)
    {

        $rayon = Rayon::find($id);
        return view('rayon.edit', compact('rayon')); 
    }

    public function update(Request $request, $id)
    {
         $request->validate([
                'nama_rayon' => 'required|string',             
            ]);

             $rayon = Rayon::findOrFail($id);
            $rayon->update([
                'nama_rayon' => $request->nama_rayon,               
            ]);
        return redirect('/rayon')->with('sukses','Berhasil Mengubah rayon '. $rayon->nama_rayon);
    }

    public function delete($id)
    {
       $rayon = Rayon::findOrFail($id);
        $rayon->delete();

        return redirect('/rayon')->with('sukses','Data Berhasil Dihapus');        
    }

}
