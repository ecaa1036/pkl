<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;
use App\Models\Industri;
use App\Models\Siswa;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    //
    public function token(){
        return view('Token.masuk');
    }

    public function tk_masuk(Request $request){
        $credentials = $request->validate([
            'token_masuk' => 'required'
        ]);
    
        // Custom logic untuk melakukan otentikasi berdasarkan token_masuk
        $industry = Industri::where('token_masuk', $credentials['token_masuk'])->first();
    
        if($industry){
            // Jika token_masuk valid, lakukan sesuatu, misalnya menyimpan informasi industri ke dalam session
            $request->session()->put('industry_id', $industry->id);
            return redirect('kehadiran');
        }else{
            // Jika token_masuk tidak valid, kembalikan pengguna ke halaman token
            return redirect('token');
        }
    }
    
    public function tk_keluar(){
        Kehadiran::where('token_keluar');
        return redirect('kehadiran');
    }

    public function add(Request $request)
{
      // Mendapatkan waktu server
      $timezone = 'Asia/Jakarta';
      $data = new DateTime('now', new DateTimeZone($timezone));
      $local = $data->format('H:i:s');
      $tgl = $data->format('Y-m-d');

    // Validasi input
    $request->validate([
        'token_masuk' => 'required',
        'nisn' => 'required'
        // tambahkan validasi lainnya sesuai kebutuhan
    ]);

         // Set nilai default untuk waktu masuk dan waktu pulang dengan waktu server
         $validateData['waktu_masuk'] = $local;
         $validateData['tgl_kehadiran'] = $tgl;

    // Cek apakah token masuk yang dimasukkan oleh siswa sesuai dengan token yang ada di industri
    $tokenIndustri = Industri::where('token_masuk', $request->token_masuk)->first();
    if (!$tokenIndustri) {
        // Token masuk tidak valid, kembalikan pesan error
        return redirect()->back()->with('pesan', 'Token masuk tidak valid!');
    }
    return redirect('absensi');
    // Token masuk valid, lanjutkan dengan proses penyimpanan kehadiran siswa
    // ...
}

public function tambah()
{
    $data['siswa'] = Siswa::all();
    return view('kehadiran.absen', $data);
}

public function show(){
    $data['hadir'] = Kehadiran::all();
    return view('kehadiran.show',$data);
}

    public function input(Request $request)
    {
        $nisn = $request->nisn;
        $siswa = Siswa::all();

        if (!$siswa) {
            // Handle the case where the student was not found in the database
            // You may want to display an error message or redirect to an error page
            // abort(404, 'Siswa tidak ditemukan');
        return view('kehadiran.absen',$siswa);  
    }

        if ($siswa->absen) {
            // Menangani kasus di mana siswa sudah melapor masuk
            $kehadiran = Kehadiran::where('nisn', $nisn)
                                    ->whereDate('tgl_kehadiran', today())
                                    ->first();

            if ($kehadiran) {
                // Siswa sudah check in hari ini, tangani kasus saat mereka check out
                $kehadiran->token_keluar = $request->token_keluar;
                $kehadiran->waktu_keluar = now();
                $kehadiran->save();
            } else {
            // Kondisi ini tidak boleh terjadi karena siswa sudah melakukan check in
                // Anda mungkin ingin menangani kasus ini atau mencatat kesalahan
            }
        } elseif ($siswa->tidak_masuk) {
        // Menangani kasus dimana siswa ditandai sebagai tidak hadir
            $kehadiran = Kehadiran::where('nisn', $nisn)
                                    ->whereDate('tgl_kehadiran', today())
                                    ->first();

            if ($kehadiran) {
                // Siswa mempunyai catatan hari ini, perbarui kolom ket
                $kehadiran->ket = $request->ket;
                $kehadiran->save();
            } else {
            // Siswa tidak mempunyai catatan hari ini, buat yang baru
                Kehadiran::create([
                    'nisn' => $nisn,
                    'tgl_kehadiran' => today(),
                    'ket' => $request->ket,
                ]);
            }
        } else {
            // Handle the case where the student has not checked in or been marked as absent
            Kehadiran::create([
                'nisn' => $nisn,
                'tgl_kehadiran' => today(),
                'token_masuk' => $request->token_masuk,
                'waktu_masuk' => now(),
            ]);
        }

        return redirect()->back();
    }


//     public function add(Request $request)
// {
//        // Mendapatkan waktu server
//        $timezone = 'Asia/Jakarta';
//        $data = new DateTime('now', new DateTimeZone($timezone));
//        $local = $data->format('H:i:s');
//        $tgl = $data->format('Y-m-d');
   
//     $kehadiran = new Kehadiran();
//     $kehadiran->tgl_kehadiran = $request->$tgl;
//     $kehadiran->waktu_masuk = $request->$local;
//     $kehadiran->waktu_pulang = $request->$local;
//     $kehadiran->token_masuk = $request->token_masuk;
//     $kehadiran->token_keluar = $request->token_keluar;
//     $kehadiran->keterangan = $request->ket;
//     $kehadiran->nisn = $request->nisn;

//     // Cek apakah siswa sudah absen atau belum
//     $cekKehadiran = Kehadiran::where('tgl_kehadiran', $request->$tgl)
//                                 ->where('nisn', $request->nisn)
//                                 ->first();

//     if ($cekKehadiran) {
//         // Siswa sudah absen, cek apakah sudah pulang atau belum
//         if ($cekKehadiran->waktu_pulang) {
//             // Siswa sudah pulang, update data kehadiran
//             $cekKehadiran->waktu_pulang = $request->$local;
//             $cekKehadiran->token_keluar = $request->token_keluar;
//             $cekKehadiran->save();
//         } else {
//             // Siswa belum pulang, update data kehadiran
//             $cekKehadiran->waktu_pulang = $request->$local;
//             $cekKehadiran->token_keluar = $request->token_keluar;
//             $cekKehadiran->save();
//         }
//     } else {
//         // Siswa belum absen, simpan data kehadiran baru
//         $kehadiran->save();
//     }

//     return redirect()->back();
// }
//     public function tambah($nisn)
//     {
//         $data['siswa'] = Siswa::find($nisn);
//         return view('kehadiran.absen', $data);
//     }

public function store(Request $request)
{
    $request->validate([
        'token_masuk' => 'required|same:industri.token_masuk',
        // other validation rules
    ]);

    // other store logic
}
public function create(){
    $data['industri'] = Industri::all();
    return view('Absen.abs',$data);
}
public function absen(){
    $data['absen'] = Kehadiran::all();
    return view('Absen.absen');
}

public function index()
{
    $industri = Industri::first();
    return view('Absen.absen', compact('industri'));
}

}
