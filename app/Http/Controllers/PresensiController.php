<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    //
    public function create(){
        return view('presensi.create');
    }

    public function store(Request $request){

        $nisn = Auth::user()->siswa->nisn;
        $tgl_kehadiran = date("Y-m-d");
        $waktu = time("H:i:s");
        // $lokasi = $request->lokasi;
        $image = $request->image;
        $folderPath = "public/uploads/kehadiran/"; //menyimpan Photo
        $formatName = $nisn . "-" . $tgl_kehadiran;
        $image_parts = explode(";base_64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;
        $data = [
            'nisn' => $nisn,
            'tgl_kehadiran' => $tgl_kehadiran,
            'waktu' => $waktu,
            'image' => $fileName
        ];
        $simpan = DB::table('kehadirans')->insert($data);
        if($simpan){
            echo 0;
            Storage::put($file, $image_base64);
        }
        echo 1;
    }

    public function jam(){
        return view('presensi.jam');
    }
}
