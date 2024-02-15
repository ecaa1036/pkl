<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Industri;
use App\Models\Monitoring;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MonitoringController extends Controller
{
    //
    public function index(){
        $data['monitoring'] = Monitoring::all();
        return view('monitoring.index',$data);
    }

    public function create(){
        $data['guru'] = Guru::all();
        $data['siswa'] = Siswa::all();
        $data['industri'] = Industri::all();
        return view('monitoring.input',$data);
    }

    public function add(Request $request){
        if(Auth::check()){

            // $guru_id = Auth::id();
            // $siswa_id = Auth::id();
            // $industri_id = Auth::id();

            $validateData = $request->validate([
                'id_guru' => 'required',
                'nisn' => 'required',
                'id_industri' => 'required',
            ]);

            // $validateData['id_guru'] = $guru_id;
            // $validateData['nisn'] = $siswa_id;
            // $validateData['id_industri'] = $industri_id;

            $monitoring = Monitoring::create($validateData);

            if($monitoring){
                Session::flash('pesan', 'Data Berhasil Disimpan');
            }else{
                Session::flash('pesan', 'Data Gagal Disimpan');
            }
        }else{
            Session::flash('pesan', 'Silahkan Login Untuk Menambahkan Monitoring');
        }

        return redirect('monitoring');
    }

    public function edit(Request $request){
        $data['monitoring'] = Monitoring::where('id_monitoring', $request->id_monitoring)->first();
        $data['guru'] = Guru::all();
        $data['siswa'] = Siswa::all();
        $data['industri'] = Industri::all();
        return view('monitoring.update',$data);
    }

    public function update(Request $request){
        if(Auth::check()){

            // $guru_id = Auth::id();
            // $siswa_id = Auth::id();
            // $industri_id = Auth::id();

            $validateData = $request->validate([
                'id_guru' => 'required',
                'nisn' => 'required',
                'id_industri' => 'required',
            ]);

            // $validateData['id_guru'] = $guru_id;
            // $validateData['nisn'] = $siswa_id;
            // $validateData['id_industri'] = $industri_id;

            $monitoring = Monitoring::where('id_monitoring', $request->id_monitoring)->update($validateData);

            if($monitoring){
                Session::flash('pesan', 'Data Berhasil Disimpan');
            }else{
                Session::flash('pesan', 'Data Gagal Disimpan');
            }
        }else{
            Session::flash('pesan', 'Silahkan Login Untuk Mengedit Monitoring');
        }

        return redirect('monitoring');
    }

    public function delete(Request $request){
        $monitoring = Monitoring::where('id_monitoring', $request->id_monitoring)->delete();

        if($monitoring){
            Session::flash('pesan', 'Data Berhasil Dihapus');
        }else{
            Session::flash('pesan', 'Data Gagal Dihapus');
        }

        return redirect('monitoring');
    }
}
