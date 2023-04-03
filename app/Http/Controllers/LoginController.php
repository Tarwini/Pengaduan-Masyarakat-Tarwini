<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Province;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{
    public function getlogin(Request $rqeuest)
    {
        if (Auth::Attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        return redirect ('logins');
    }
    public function postlogin(Request $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        }
        return redirect('logins');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/logins');
    }

    public function postRegis(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'jenkel' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kode_pos' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
        ]);

        User::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'jenkel' => $request->jenkel,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kode_pos' => $request->kode_pos,
            'province_id' => $request->province_id,
            'regency_id' => $request->regency_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
        ]);
          
        

        return redirect('logins');
    }
}
