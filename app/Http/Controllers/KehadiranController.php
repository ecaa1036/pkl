<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class KehadiranController extends Controller
{
    //
    public function index(){
        $data['kehadiran'] = Kehadiran::all();
        return view('kehadiran.index',$data);
    }

    public function create(){
        $data['siswa'] = Siswa::all();
        return view('kehadiran.input',$data);
    }

    public function add(Request $request){
        // $foto = $request->file('foto')->store('foto', 'public');

        $validateData = $request->validate([
            'waktu_masuk' => 'required',
            'waktu_pulang' => 'required',
            'qode' => 'required',
            'nisn' => 'required'
            // 'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            // 'nisn' => Auth::guard('web')->user()->nisn,
        ]);

        // $validateData['nisn'] = Auth::siswa()->nisn;

        $hadir = Kehadiran::create($validateData);

        if($hadir){
            Session::flash('pesan', 'Data Tersimpan');
        }else{
            Session::flash('pesan', 'Data Gagal Disimpan');
        }

        return redirect('kehadiran');
    }

    public function store(Request $request){
        
        $no = mt_rand(1000000000,9999999999);

        
        if($this->kehadiran($no)) {
        $no = mt_rand(1000000000,999999999);
            
        }
        
        $request['qode'] = $no;
        Kehadiran::create($request->all());

        return redirect('kehadiran');
    }
    public function kehadiran($no){
        return Kehadiran::where('qode', $no)->exists();
    }

    public function edit(Request $request){
        $data['kehadiran'] = Kehadiran::where('id_kehadiran', $request->id_kehadiran)->first();
        $data['siswa'] = Siswa::all();
        return view('kehadiran.update-kehadiran',$data);
    }

    // public function update(Request $request){
    //     $no = mt_rand(1000000000,9999999999);

        
    //     if($this->kehadiran($no)) {
    //     $no = mt_rand(1000000000,999999999);
            
    //     }
        
    //     $request['qode'] = $no;
    //     Kehadiran::where('id_kehadiran', $request->id_kehadiran)->update($request->all());

    //     return redirect('kehadiran');
    
    // }

    public function update(Request $request)
    {
        $kehadiran = Kehadiran::find($request->id_kehadiran);
    
        if ($kehadiran) {
            // Remove the 'qode' field from the request data
            $request->request->remove('qode');
    
            // Update the kehadiran record with the new data
            $updated = $kehadiran->update($request->all());
    
            if ($updated) {
                return redirect('kehadiran')->with('pesan', 'Data berhasil diupdate');
            } else {
                // Handle the case where the update fails
                return redirect()->back()->with('pesan', 'Gagal mengupdate data');
            }
        } else {
            // Handle the case where kehadiran with the given id is not found
            return redirect()->back()->with('pesan', 'Data tidak ditemukan');
        }
    }

    public function delete(Request $request){
        $kehadiran = Kehadiran::where('id_kehadiran', $request->id_kehadiran)->delete();

        if($kehadiran){
            Session::flash('pesan', 'Data Berhasil Dihapus');
        }else{
            Session::flash('pesan', 'Data Gagal Dihapus');
        }

        return redirect('kehadiran');
    }
    
}
