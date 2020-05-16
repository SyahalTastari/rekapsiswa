<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Siswa;
use Illuminate\Http\Request;
use App\Http\Requests\ErrorFormRequest;

class ProfileController extends Controller
{
    public function index()
    {
    	$user = DB::table('siswa')->where('user_id',auth()->user()->id)->first();
        $siswa = Siswa::find($user->id);
        $data = DB::table('siswa')
            ->join('rayon', 'siswa.rayon_id', '=', 'rayon.id')
            ->join('rombel', 'siswa.rombel_id', '=', 'rombel.id')
            ->select('siswa.*','rayon.nama_rayon','rombel.nama_rombel')
            ->where('user_id',auth()->user()->id)
            ->first();

        
        
    	return view('profile.index',compact('user','siswa','data'));
    }

    public function reset(ErrorFormRequest $request, $id)
    {
    	$request->validate([
    		'password' => 'min:6|required_with:cpassword|same:cpassword',
            'cpassword' => 'min:6'
    	]);

    	$user = User::findOrFail($id);
    	$user->update([
    		'password' => bcrypt($request->password),
            ]);
         return redirect('/profile');
    }

    public function password()
    {
    	return view('profile.edit');
    }
}
