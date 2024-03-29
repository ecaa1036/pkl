<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Industri;
use App\Models\Kelas;
use App\Models\Monitoring;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\User;

class TemplateController extends Controller
{
    //
    public function index(){
        return view('template.navbar');
    }

    public function user(){
        $data['user'] = User::all();
        return view('template.user',$data);
    }

    public function ds(){
        $data['user'] = User::count();
        $data['siswa'] = Siswa::count();
        $data['guru'] = Guru::count();
        $data['industri'] = Industri::count();
        $data['kelas'] = Kelas::count();
        return view('template.dbs',$data);
    }

    public function ind(){
        return view('template.dasboard');
    }

    public function halaman(){
        $data['user' ] = User::count();
        $data['siswa'] = Siswa::count();
        $data['guru'] = Guru::count();
        $data['kelas'] = Kelas::count();
        $data['industri'] = Industri::count();
        $data['monitoring'] = Monitoring::count();
        return view('template.hlmawal',$data);
    }
}
