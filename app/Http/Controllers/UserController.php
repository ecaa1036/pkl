<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function index(){
        $data['user'] = User::all();
        return view('auth.user',$data);
    }

    public function create(){
        return view('auth.input-user');
    }

    public function add(Request $request){
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        $user = User::create($validate);

        if($user){
            Session::flash('pesan',  'Data Berhasil Disimpan');
        }else{
            Session::flash('pesan', 'Data Gagal Disimpan');
        }

        return redirect('user');
    }

    public function delete(Request $request){
        $user = User::where('id_user', $request->id_user)->delete();

        if($user){
            Session::flash('pesan',  'Data Berhasil Dihapus');
        }else{
            Session::flash('pesan', 'Data Gagal Dihapus');
        }

        return redirect('user');
    }

    public function edit(Request $request){
        $data['user'] = User::where('id_user', $request->id_user)->first();
        return view('auth.update-user',$data);
    }

    public function update(Request $request){
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        $user = User::where('id_user', $request->id_user)->update($validate);

        if($user){
            Session::flash('pesan',  'Data Berhasil DiUbah');
        }else{
            Session::flash('pesan', 'Data Gagal DiUbah');
        }

        return redirect('user');
    }

    public function cari(Request $request){
        $data['user'] = User::where('username', 'LIKE', '%'. $request->cari .'%')->orWhere('level', $request->cari)->get();
        return view('auth.user',$data);
    }
}
