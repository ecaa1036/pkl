<?php

namespace App\Http\Controllers;

use App\Models\Industri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IndustriController extends Controller
{
    //
    public function index(){
        $data['industri'] = Industri::all();
        return view('industri.index',$data);
    }

    public function create(){
        $data['user'] = User::where('level', 'industri')->get();
        return view('industri.input',$data);
    }

    public function add(Request $request){
        if(Auth::check()){
            // $user_id = Auth::id();
            
            $validateData = $request->validate([
                'nama_industri' => 'required',
                'pemilik_industri' => 'required',
                'alamat_industri' => 'required',
                'nohp_industri' => 'required',
                'id_user' => 'required',
            ]);
            //  $validateData['id_user'] = $user_id;

            $industri = Industri::create($validateData);

            if($industri){
                Session::flash('pesan', 'Data Berhasil Disimpan');
            }else{
                Session::flash('pesan', 'Data Gagal Disimpan');
            }

        }else{
            Session::flash('pesan', 'Silahkan login untuk menambahkan industri!');
        }

        return redirect('industri');
    }

    public function delete(Request $request){
        $industri = Industri::where('id_industri', $request->id_industri)->delete();

        if($industri){
            Session::flash('pesan', 'Data Berhasil Dihapus');
        }else{
            Session::flash('pesan', 'Data Gagal Dihapus');
        }

        return redirect('industri');
    }

    public function edit(Request $request){
        $data['industri'] = Industri::where('id_industri', $request->id_industri)->first();
        $data['user'] = User::where('level', 'industri')->get();
        return view('industri.update-industri',$data);
    }

    public function update(Request $request){
        if(Auth::check()){
            // $user_id = Auth::id();

            $validateData = $request->validate([
                'nama_industri' => 'required',
                'pemilik_industri' => 'required',
                'alamat_industri' => 'required',
                'nohp_industri' => 'required',
                'id_user' => 'required',
            ]);
            //  $validateData['id_user'] = $user_id;

            $industri = Industri::where('id_industri', $request->id_industri)->update($validateData);

            if($industri){
                Session::flash('pesan', 'Data Berhasil Diubah');
            }else{
                Session::flash('pesan', 'Data Gagal Diubah');
            }

        }else{
            Session::flash('pesan', 'Silahkan login untuk mengubah industri.');
        }

        return redirect('industri');

    }
}
