<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Tanggapan;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $pengaduan = Pengaduan::all();
    	return view('pengaduan.index', ['pengaduan' => $pengaduan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    	return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'tgl_pengaduan' => 'required',
    		'nik' => 'required',
    		'isi_laporan' => 'required',
    		'foto' => 'required',
    	]);

        $imgName = $request->foto->getClientOriginalName() . '-' . time() . '-' . $request->foto->extension();
        $request->foto->move(public_path('image'), $imgName);
 
        Pengaduan::create([
    		'tgl_pengaduan' => $request->tgl_pengaduan,
    		'nik' => $request->nik,
    		'isi_laporan' => $request->isi_laporan,
    		'foto' => $imgName,
    	]);
 
    	return redirect('/pengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();

        return view('pengaduan.show',  ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pengaduan)
    {
        $pengaduan = Pengaduan::find($id_pengaduan);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id_pengaduan ,Request $request)
    {
        $this->validate($request,[
            'tgl_pengaduan' => 'required',
            'nik' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'required',
            'status' => 'required',
         ]);
      
         $pengaduan = Pengaduan::find($id_pengaduan);
         $pengaduan->tgl_pengaduan = $request->tgl_pengaduan;
         $pengaduan->nik = $request->nik;
         $pengaduan->isi_laporan = $request->isi_laporan;
         $pengaduan->foto = $request->foto;
         $pengaduan->status = $request->status;
         $pengaduan->save();
         return redirect('/pengaduan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengaduan)
    {
        $pengaduan = Pengaduan::find($id_pengaduan);
        $pengaduan->delete();
        return redirect('/pengaduan');
    }

    public function cetak()
    {
        $pengaduan = Pengaduan::all();
        return view('laporan.cetak', compact('pengaduan'));
    }
}