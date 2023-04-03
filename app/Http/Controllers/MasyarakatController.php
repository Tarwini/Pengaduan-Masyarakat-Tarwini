<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use App\Pengaduan;
use App\User;
use PDF;

class MasyarakatController extends Controller
{
    public function index(Request $request)
    {
        if($request) {
            if($request->cari != ''){
                $masyarakat = User::whereColumn([
                    ['level', "<>","admin"],
                    ['level', "<>","masyarakat"]
                    
                ])
                ->orWhere('level', "<>","admin")
                ->Where('level', "<>","masyarakat")
                ->get();
            }else{
                $masyarakat = User::Where('level', "<>","admin")
                ->get();
            }
            
        }else{
            $masyarakat = User::all();
        }
        return view('masyarakat.index', compact('masyarakat'));
    }

    public function create()
    {
        $provinces = Province::all();
        return view('masyarakat.create', compact('provinces'));
    }

    public function getkbptn(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option>Pilih Kabupaten</option>";

        foreach ($kabupatens as $kabupaten){
            $option .= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }

        echo $option;
    }

    public function getkcmtn(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option>Pilih Kecamatan</option>";

        foreach ($kecamatans as $kecamatan){
            $option .= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        echo $option;
    }

    public function getds(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $desas = Village::where('district_id', $id_kecamatan)->get();

        $option = "<option>Pilih Desa</option>";

        foreach ($desas as $desa){
            $option .= "<option value='$desa->id'>$desa->name</option>";
        }
        echo $option;
    }

    public function store(Request $request)
    {
        $data_user = new User();
        $data_user->nik = request()->get('nik');
        $data_user->nama = request()->get('nama');
        $data_user->email = request()->get('email');
        $data_user->password = bcrypt(request()->get('password'));
        $data_user->telp = request()->get('telp');
        $data_user->jenkel = request()->get('jenkel');
        $data_user->alamat = request()->get('alamat');
        $data_user->level = 'masyarakat';
        $data_user->rt = request()->get('rt');
        $data_user->rw = request()->get('rw');
        $data_user->kode_pos = request()->get('kode_pos');
        $data_user->province_id = request()->get('province_id');
        $data_user->regency_id = request()->get('regency_id');
        $data_user->district_id = request()->get('district_id');
        $data_user->village_id = request()->get('village_id');
        $data_user->save();
        return redirect()->to('/masyarakat')->with('Data ditambah','Data berhasil ditambah');
    }


    public function show($id)
    {
        $province = Province::all();
        $district = District::all();
        $regency = Regency::all();
        $village = Village::all();
        $petugas = User::where('id', $id)->first();
        return view('masyarakat.show', compact('masyarakat','province','district','regency','village'));
    }
 
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect('/petugas')->with('Data terhapus','Data berhasil dihapus!');
    }

    //cetak laporan
    public function pdf(){
        $pengaduan = Pengaduan::with('user')->get();
        $pdf = PDF::loadView('petugas.cetak',compact('pengaduan'))->setPaper('a4','landscape');
        return $pdf->stream();
    }

}
