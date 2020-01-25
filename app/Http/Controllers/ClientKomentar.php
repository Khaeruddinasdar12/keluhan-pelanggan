<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientKomentar extends Controller
{
    public function store(Request $request)
    {	
    	// return $request;
    	$validasi = $this->validate($request, [
            'pesan' => 'required',
            'departmen_id' => 'required',
            'alamat' => 'required',
            'nohp' => 'required|numeric|digits_between:11,13',
            'email' => 'required|email',
            'nama' => 'required'
        ],[
        	'email.required' => 'Kolom email harus terisi',
        	'email.email' => 'Kolom email harus format email',
        	'nohp.required' => 'Kolom No. Hp harus terisi',
        	'departmen_id.required' => 'Wajib memilih bagian/departmen',
        	'pesan.required' => 'Kolom pesan harus terisi',
        	'nama.required' => 'Kolom nama harus terisi',
        	'nohp.digits_between' => 'Kolom No. Hp harus 11 - 13 digit',
        	'nohp.numeric' => 'Kolom No. Hp harus angka'
        	
        ]);

    	$data = new \App\Komentar;
    	$data->nama 	= $request->nama;
    	$data->email 	= $request->email;
    	$data->nohp 	= $request->nohp;
    	$data->alamat 	= $request->alamat;
    	$data->jenis_kelamin = $request->jkel;
    	$data->departmen_id = $request->departmen_id;
    	$data->pesan = $request->pesan;
    	$data->admin_verified = 'no',
    	$data->save();

    	return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil Mengirim Pesan' );
    }
}
