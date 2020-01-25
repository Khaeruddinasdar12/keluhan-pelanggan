<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

class TableApi extends Controller
{
    public function test()
    {
        // $data  = array(
        //     'name' => 'Angelica Akiang',
        //     'pesan'=> 'Terima Kasih telah memberikan saran kepada kami. kami akan segera meninjau departmen kami sesuai dengan komentar Anda');

        return view('feedback', ['name' => 'Angelica Akiang', 'pesan' => 'Terima Kasih telah memberikan saran kepada kami. kami akan segera meninjau departmen kami sesuai dengan komentar Anda.', 'bidang' => ' 
Bidang Pemasaran Bisnis 1']);
    }


    public function komentar()
    {
        $data = \App\Komentar::all();

        return $data;
    }

    public function detail_komentar($id)
    {
        $data = \App\Komentar::find($id);

        return $data;
    }
    public function tabel_komentar_terbaca()
    {
    	$data = \App\Komentar::select('id', 'nama', 'email')->where('admin_verified', '=', 'yes')->get();

        // return $data;
    	return Datatables::of($data)
    	->addColumn('action', function ($data) {
        return "<span class='badge badge-warning'>Terlihat</span>


                <button class='btn btn-success btn-xs'
                        title='Detail Komentar' id='detail'
                        href='".$data->id."/detail'
                        data-id='".$data->id."' onclick='detail()'>
                        <i class='fa fa-eye'></i>
                </button>

                <button class='btn btn-danger btn-xs' title='Hapus Data' id='del_id' 
                        href='komentar/".$data->id."' onclick='hapus()'>
                        <i class='fa fa-trash'></i>
                </button>";
        })
        ->addIndexColumn() 
        ->make(true);
    	// return view('admin.dashboard');
    }

    public function tabel_komentar_belum_dibaca()
    {
        $data = \App\Komentar::select('id', 'nama', 'email')->where('admin_verified', '=', 'no')->get();

        return Datatables::of($data)
        ->addColumn('action', function ($data) {
        return "<button class='btn btn-success btn-xs'
                        title='Detail & Reply' id='detail'
                        href='".$data->id."/detail'
                        data-id='".$data->id."' onclick='detail()'>
                        <i class='fa fa-eye'></i>
                </button>

                <button class='btn btn-danger btn-xs' title='Hapus Data' id='del_id' 
                        href='komentar/".$data->id."' onclick='hapus()'>
                        <i class='fa fa-trash'></i>
                </button>";
        })
        ->addIndexColumn() 
        ->make(true);
        // return view('admin.dashboard');
    }

    public function detail($id)
    {
    	$data = \App\Komentar::where('id', $id)->with('departmen:id,nama')->first();
// return $data->id;
    	// return $data->created_at->format('Y-m-d');
    	if($data->jenis_kelamin == 'P'){
    		$jkel = 'Perempuan';
    	} else {
    		$jkel = 'Laki-laki';
    	}
    	 $arrayName = 
    		array(
                'id' =>$data->id,
    			'nama' => $data->nama,
    			'email' => $data->email,
    			'nohp' => $data->nohp,
    			'alamat' => $data->alamat,
    			'jkel' => $jkel,
    			'pesan' => $data->pesan,
    			'waktu' => $data->created_at->format('Y-m-d'),
    			'bidang' => $data->departmen->nama
    		);

    	return response()->json($arrayName);
    }
}
