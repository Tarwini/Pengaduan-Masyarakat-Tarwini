<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanggapan;
use App\Pengaduan;
use App\User;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function statusOnchange(Request $request)
    {

        // dd($request->all());
        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();
        // dd($pengaduan);

        $pengaduan->update(['status' => $request->status]);

        $tanggapan = Tanggapan::create([
            'id_pengaduan' => $request->id_pengaduan,
            'tgl_tanggapan' => date('y-m-d'), 
            'tanggapan' => $request->tanggapan
        ]);
        return redirect('/pengaduan');
    }

    public function index()
    {
        $tanggapan = Tanggapan::all();
    	return view('tanggapan.index', ['tanggapan' => $tanggapan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdate(Request $request)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();

        $tanggapan = Tanggapan ::where('id_pengaduan', $request->id_pengaduan)->first();

        if ($tanggapan){
            $pengaduan->update(['status' => $request->status]);
            
            $tanggapan->update([
                'tgl_tanggapan' => date('y-m-d'), 
                'tanggapan' => $request->tanggapan
            ]);

            return redirect()->route('tanggapan.show', ['pengaduan', 'tanggapan' => $tanggapan]);
        } else {
            $pengaduan->update(['status' => $request->status]);

            $tanggapan = Tanggapan::create([
                'id_pengaduan' => $request->pengaduan,
                'tgl_tanggapan' => date('y-m-d'), 
                'tanggapan' => $request->tanggapan
            ]);
            return redirect()->route('tanggapan.show', ['pengaduan', 'tanggapan' => $tanggapan])->with(['status' => 'Berhasil Dikirim']);
        }
       
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
