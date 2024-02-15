<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    //
    public function index(){
        $data['siswa'] = Siswa::all();
        return view('siswa.index', $data);
    }

    public function create(){
        $data['kelas'] = Kelas::all();
        $data['user'] = User::where('level', 'siswa')->get();
        return view('siswa.input',$data);
    }

    public function add(Request $request){
        if(Auth::check()){
            // $user_id = Auth::id();
            // $kelas_id = Auth::id();

            $validate = $request->validate([
                'nisn' => 'required',
                'nama' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
                'id_user' => 'required',
                'id_kelas' => 'required',
                
            ]);

            $siswa = Siswa::create($validate);

            if($siswa){
                Session::flash('pesan', 'Data Berhasil Disimpan');
            }else{
                Session::flash('pesan', 'Data Gagal Disimpan');
            }
        }else{
            Session::flash('pesan', 'Silahkan Login Terlebih Dahulu');
        }

        return redirect('siswa');
    }

    public function delete(Request $request){
        $siswa = Siswa::where('nisn', $request->nisn)->delete();

        if($siswa){
            Session::flash('pesan', 'Data Berhasil Disimpan');
        }else{
            Session::flash('pesan', 'Data Gagal Disimpan');
        }

        return redirect('siswa');

    }

    public function edit(Request $request){
        $data['siswa'] = Siswa::where('nisn', $request->nisn)->first();
        $data['kelas'] = Kelas::all();
        $data['user'] = User::where('level', 'siswa')->get();
        return view('siswa.update-siswa',$data);
    }

    public function update(Request $request){
        if(Auth::check()){;

            $validate = $request-> validate([
                'nisn' => 'required',
                'nama' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
                'id_user' => 'required',
                'id_kelas' => 'required',
            ]);

            $siswa = Siswa::where('nisn', $request->nisn)->update($validate);
            if($siswa){
                    Session::flash('pesan', 'Data Berhasil Diubah');
                } else {
                    Session::flash('pesan', 'Data Gagal Diubah');
                }
       
        }else{
            Session::flash('pesan', 'Silahkan Login Untuk Mengedit Data Siswa');
        }

        return redirect('siswa');
    }
}
