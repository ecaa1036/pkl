<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GuruController extends Controller
{
    //
    public function index(){
        $data['guru'] = Guru::all();
        return view('guru.index',$data);
    }

    public function create(){
        $data['user'] = User::where('level', 'guru')->get();
        return view('guru.input',$data);
    }

    public function add(Request $request){
        if(Auth::check()) { // Check if a user is authenticated
            // $user_id = Auth::id(); // Get the authenticated user's ID
            
            $validate = $request->validate([
                'nama_guru' => 'required',
                'nohp_guru' => 'required',
                'id_user' => 'required',
            ]);
    
            // $validate['id_user'] = $user_id; 
    
            $guru = Guru::create($validate);
    
            if($guru){
                Session::flash('pesan', 'Data Berhasil Disimpan');
            } else {
                Session::flash('pesan', 'Data Gagal Disimpan');
            }
        } else {
            // Jika Belum Login
            Session::flash('pesan', 'Silahkan login untuk menambahkan guru.');
        }
    
        return redirect('guru');
    }
    
    public function edit(Request $request){

        $data['guru'] = Guru::where('id_guru', $request->id_guru)->first();
        $data['user'] = User::where('level', 'guru')->get();
        return view('guru.update-guru',$data);
    }

    public function update(Request $request){
        if(Auth::check()) { // Check if a user is authenticated
            // $user_id = Auth::id(); // Get the authenticated user's ID
            
            $validate = $request->validate([
                'nama_guru' => 'required',
                'nohp_guru' => 'required',
                'id_user' => 'required',
            ]);
    
            // $validate['id_user'] = $user_id;
    
            $guru = Guru::where('id_guru',$request->id_guru)->update($validate);
    
            if($guru){
                Session::flash('pesan', 'Data Berhasil Diubah!');
            } else {
                Session::flash('pesan', 'Data Gagal Diubah!');
            }
        } else {
            // Handle the case where the user is not authenticated
            Session::flash('pesan', 'Silahkan login untuk mengubah guru!');
        }
    
        return redirect('guru');
    }
    
    public function delete(Request $request){
        $guru = Guru::where('id_guru', $request->id_guru)->delete();

        if($guru){
            Session::flash('pesan', 'Data Berhasil DiHapus');
        }else{
            Session::flash('pesan', 'Data Gagal DiHapus');
        }

        return redirect('guru');
    }
}
