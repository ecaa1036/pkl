<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    //
    public function index(){
        $data['kelas'] = Kelas::all();
        return view('kelas.index',$data);
    }

    public function add(Request $request){
        $validete = $request->validate([
            'kelas' => 'required'
        ]);
        
        $kelas = Kelas::create($validete);

        if($kelas){
            Session::flash('pesan', 'Data Berhasil Disimpan');
        }else{
            Session::flash('pesan', 'Data Gagal Disimpan');
        }

        return redirect('kelas');
    }

    public function create(){
        return view('kelas.input');
    }

    public function delete(Request $request){
        $kelas = Kelas::where('id_kelas', $request->id_kelas)->delete();

        if($kelas){
            Session::flash('pesan', 'Data Berhasil Dihapus');
        }else{
            Session::flash('pesan', 'Data Gagal Dihapus');
        }

        return redirect('kelas');
    }

    public function edit(Request $request){
        $data['kelas'] = Kelas::where('id_kelas', $request->id_kelas)->first();
        return view('kelas.update-kelas',$data);
    }

    public function update(Request $request){
        $validete = $request->validate([
            'kelas' => 'required'
        ]);

        $kelas = Kelas::where('id_kelas',$request->id_kelas)->update($validete);

        if($kelas){
            Session::flash('pesan', 'Data Berhasil Diubah');
        }else{
            Session::flash('pesan', 'Data Gagal Diubah');
        }

        return redirect('kelas');
    }
}
