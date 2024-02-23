<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Industri;
use App\Models\Monitoring;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
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

    public function show(){
        if(Auth::user()->level == 'admin'){
            $data['guru'] = Guru::all();
            $data['kelas'] = Kelas::all();
            $data['siswa'] = Siswa::with('kelas')->get();
            $data['industri'] = Industri::all();
            // $data['monitoring'] = Monitoring::with('guru')->with('industri')->with('siswa')->groupBy('id_industri')->get();
            $data['monitoring'] = Monitoring::with('guru')->with('industri')->with('siswa')
            ->selectRaw('id_industri, MAX(id_monitoring) as id_monitoring, id_guru, nisn, id_industri')
            ->groupBy('id_industri', 'id_guru', 'nisn', 'id_industri')
            ->get();
            // $data['monitoring'] = Monitoring::with('guru')->with('industri')->with('siswa')
            //             ->selectRaw('id_industri, MAX(id_monitoring) as id_monitoring')
            //             ->groupBy('id_industri')
            //             ->get();
        }else{
            $data['user'] = User::where('id_user', Auth::user()->id)->get();
            $userId = $data['user'][0]->id;
            $data['guru'] = Guru::where('id_user', $userId)->first();
            $guruId = $data['guru']->id;
            $data['kelas'] = Kelas::all();
            $data['siswa'] = Siswa::with('kelas')->get();
            $data['industri'] = Industri::all();
            // $data['monitoring'] = Monitoring::where('id_guru',$guruId)->with('guru')->with('industri')->with('siswa')->groupBy('id_industri')->get();
            $data['monitoring'] = Monitoring::with('guru')->with('industri')->with('siswa')
            ->selectRaw('id_industri, MAX(id_monitoring) as id_monitoring')
            ->groupBy('id_industri')
            ->get();     
          }

        return view('monitoring.index',$data);
    }
       

    public function add(Request $request){
        if(Auth::check()){

            foreach ($request->nisn as $key => $value) {
                // Validate each set of data individually

                $monitoring = Monitoring::create([
                    'id_guru' => $request->id_guru,
                    'nisn' => $value,
                    'id_industri' => $request->id_industri,
                ]);
            }
    

            // $monitoring = Monitoring::create($validateData);

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
