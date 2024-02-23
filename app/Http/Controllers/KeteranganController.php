<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Session;

class KeteranganController extends Controller
{
    //

    public function index(){
        $data['ket'] = Keterangan::all();
        return view('Ket.index',$data);
    }

    public function create(){
        $data['siswa'] = Siswa::all();
        return view('Ket.form',$data);
    }

    public function add(Request $request){
        $validate = $request->validate([
            'ket' => 'required',
            'status' => 'required',
            'nisn' => 'required'
        ]);

        $ket = Keterangan::create($validate);

        if($ket){
            Session::flash('pesan', 'Data Berhasil Disimpan');
        }else{
            Session::flash('pesan', 'Data Gagal Disimpan');
        }

        return redirect('keterangan');
    }

    public function delete(Request $request){
        $ket = Keterangan::where('id_ket', $request->id_ket)->delete();

        if($ket){
            Session::flash('pesan', 'Data Berhasil DiHapus');
        }else{
            Session::flash('pesan', 'Data Gagal Dihapus');
        }

        return redirect('keterangan');
    }

    public function edit(Request $request){
        $data['ket'] = Keterangan::where('id_ket', $request->id_ket)->first();
        $data['siswa'] = Siswa::all();
        return view('Ket.update',$data);
    }

    public function update(Request $request){
        $validate = $request->validate([
            'ket' => 'required',
            'status' => 'required',
            'nisn' => 'required'
        ]);

        $ket = Keterangan::where('id_ket', $request->id_ket)->update($validate);

        if($ket){
            Session::flash('pesan', 'Data Berhasil Diubah');
        }else{
            Session::flash('pesan', 'Data Gagal Diubah');
        }

        return redirect('keterangan');
    }
}
