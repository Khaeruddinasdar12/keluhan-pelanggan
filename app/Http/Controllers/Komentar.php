<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class Komentar extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $all = \App\Komentar::count();

        $belum = \App\Komentar::where('admin_verified', 'no')->count();
        $terbaca = \App\Komentar::where('admin_verified', 'yes')->count();
        // return $terbaca;

    	return view('admin.dashboard',['all' => $all, 'belum' => $belum, 'terbaca' => $terbaca]);
    }

    public function komentar_terbaca()
    {
        $belum = \App\Komentar::where('admin_verified', 'no')->count();
    	return view('admin.komentar_terbaca', ['belum' => $belum]);
    }

    public function komentar_belumterbaca()
    {
        $belum = \App\Komentar::where('admin_verified', 'no')->count();
        return view('admin.komentar_belumterbaca', ['belum' => $belum]);
    }

    

    public function feedback(Request $request)
    {
        // return $request;
    	$data = \App\Komentar::where('email', '=', $request->email)
                            ->where('id', '=', $request->id)
                            ->first();
        // $data = \App\Komentar::find($id);
        
        // return $data;
        $email = $data->email;
        $judul= $request->judul;
        $nama = $data->nama;
        $data_send = array(
                'name' => $nama,
                'pesan' => $request->pesan,
                'bidang' => $data->departmen->nama
            );
        // return $data_send;
        Mail::send('feedback', $data_send, function($mail) use($email, $judul) {
                $mail->to($email, 'no-reply')
                ->subject($judul);
                $mail->from('iporterteam@gmail.com', 'Angelica Keluhan');        
            });
            if (Mail::failures()) {
                return $arrayName = array('status' => 'error' , 'pesan' => 'Gagal menigiri email' );
            }
        $data->admin_verified = 'yes';
        $data->save();
        return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil, email terkirim ke '.$nama );
    }

    public function delete($id) 
    {
    	$data = \App\Komentar::find($id);
    	$data->delete();

    	return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil Menghapus Data' );
    }
}
