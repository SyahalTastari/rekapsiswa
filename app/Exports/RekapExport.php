<?php 

namespace App\Exports;

use App\Detail;
use App\Siswa;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapExport implements FromView
{
    public function view(): View
    {
        return view('rekap.semua', [
            'semua' => DB::table('siswa')
            ->join('detail', 'siswa.id', '=', 'detail.siswa_id')
            ->join('rayon','siswa.rayon_id','=','rayon.id')
            ->join('rombel','siswa.rombel_id', '=','rombel.id')
            ->select('siswa.*','detail.*','rayon.*','rombel.*')
            ->where('detail.tanggal','2020-05-08')
            ->orderBy('siswa.nama','asc')
            ->get()
        ]);
    }
}

 ?>