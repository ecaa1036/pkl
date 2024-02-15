<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AktivitasController extends Controller
{
    //
    public function index(){
        $data['aktivitas'] = Aktivitas::all();
        return view('aktivitas.index',$data);
    }

    public function create(){
        $data['kehadiran'] = Kehadiran::all();
        return view('aktivitas.input',$data);
    }

    public function add(Request $request){
        $validateData = $request->validate([
            'deskripsi' => 'required',
            'foto' => 'required',
            'durasi' => 'required',
            'id_kehadiran' => 'required'
        ]);

        $aktivitas = Aktivitas::create($validateData);

        if($aktivitas){
            Session::flash('pesan', 'Data Berhasil Disimpan');
        }else{
            Session::flash('pesan', 'Data Gagal Disimpan');
        }

        return redirect('aktivitas');
    }
}
