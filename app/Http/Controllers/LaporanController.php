<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function cetak_pdf()
    {
        $pengaduan = Pengaduan::with('user')->get();
        $pdf = PDF::loadview('laporan.cetak', compact('pengaduan'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
    
    public function getlaporan(Request $request)
    {
        $from =$request->from . ' ' . '00:00:00';
        $to =$request->to . ' ' . '23:59:59';

        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from,$to])->get();

        return view('laporan.index', ['pengaduan' => $pengaduan, 'from' => $from, 'to' => $to]);
    }
}
