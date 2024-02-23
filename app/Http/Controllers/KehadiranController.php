<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Monitoring;
use App\Models\Siswa;
use DateTime;
use DateTimeZone;
use PHPExcel;
use PHPExcel_IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class KehadiranController extends Controller
{
    //

    public function export()
    {
        // Terima data pencarian dari view
        $nisn = $_POST['nisn'];
    
        // Cari data yang sesuai dari tabel kehadiran
        $data = Kehadiran::where('nisn', $nisn)->get();
    
        // Buat file Excel baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Tambahkan data ke file Excel
        $row = 1;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->nisn);
            $sheet->setCellValue('B' . $row, $item->waktu_masuk);
            $sheet->setCellValue('C' . $row, $item->waktu_pulang);
            $sheet->setCellValue('D' . $row, $item->tanggal);
            $row++;
        }
    
        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'data_kehadiran.xlsx';
        $writer->save($filename);
    
        // Berikan tautan download ke file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        readfile($filename);
    }

    public function index(){
        $data['kehadiran'] = Kehadiran::all();
        return view('kehadiran.index',$data);
    }

    public function create(){
        $data['siswa'] = Siswa::all();
        return view('kehadiran.input',$data);
    }

    public function token($id_kehadiran){
        // $data['hadir'] = Kehadiran::with('siswa')->where('id_kehadiran', $id_kehadiran)->first();
        $data['hadir'] = Kehadiran::find($id_kehadiran);
        return view('kehadiran.tkn',$data);
    }

    public function input(Request $request){
          // Mendapatkan waktu server
          $timezone = 'Asia/Jakarta';
          $data = new DateTime('now', new DateTimeZone($timezone));
          $local = $data->format('H:i:s');
          $tgl = $data->format('Y-m-d');

        $nisn = Auth::user()->siswa->nisn;
        // $waktu = date('H:i:s');
        // $tgl_kehadiran = date('Y-m-d');
        $cek = Kehadiran::where('tgl_kehadiran', $tgl)->where('nisn', $nisn)->count();

        if($cek > 0) {
            $data_pulang = [
                'waktu_pulang' => $local,
                'token_keluar' => $request->token_keluar,
            ];
            $update = Kehadiran::where('tgl_kehadiran' , $tgl)->where('nisn', $nisn)->update($data_pulang);
        }else{
            $token_masuk = Monitoring::where('nisn', $nisn)->with(['industri'])->first();
            $data = [
                'nisn' => $nisn,
                'tgl_kehadiran' => $tgl,
                'waktu_masuk' => $local,
                'token_masuk' => $request->token_masuk
            ];
            $simpan = Kehadiran::create($data);
        }
        return redirect('kehadiran');
    }

    public function add(Request $request){

        // Mendapatkan waktu server
        $timezone = 'Asia/Jakarta';
        $data = new DateTime('now', new DateTimeZone($timezone));
        $local = $data->format('H:i:s');
        $tgl = $data->format('Y-m-d');
    
        // Validasi data dengan mengatur default value untuk 'waktu_masuk' dan 'waktu_pulang'
        $validateData = $request->validate([
            // 'tgl_kehadiran' => 'required',
            'token_masuk' => 'required',
            'token_keluar' => 'required',
            'ket' => 'required',
            'nisn' => 'required'
        ]);
    
        // Set nilai default untuk waktu masuk dan waktu pulang dengan waktu server
        $validateData['waktu_masuk'] = $local;
        $validateData['waktu_pulang'] = $local;
        $validateData['tgl_kehadiran'] = $tgl;
    
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
     
    public function up(Request $request){

        $validateData = $request->validate([
            'tgl_kehadiran' => 'required',
            'waktu_masuk' => 'required',
            'waktu_pulang' => 'required',
            'ket' => 'required',
            'nisn' => 'required'
            // 'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            // 'nisn' => Auth::guard('web')->user()->nisn,
        ]);

        $hadir = Kehadiran::where('id_kehadiran', $request->id_kehadiran)->update($validateData);

        if($hadir){
            Session::flash('pesan', 'Data Berhasil Diedit');
        }else{
            Session::flash('pesan', 'Data Gagal Diedit');
        }

        return redirect('kehadiran');
    }

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

    // Controller untuk menyimpan data absen masuk
public function at(Request $request)
{
    $validatedData = $request->validate([
        // Validasi lainnya
        'token_masuk' => 'required', // Pastikan token masuk diisi
        // Tambahan validasi jika diperlukan
    ]);

    // Cek kecocokan token masuk dengan token yang terkait dengan siswa
    $siswa = Siswa::where('nisn', $request->nisn)->first();
    if ($siswa && $siswa->token_masuk !== $request->token_masuk) {
        return back()->withErrors(['token_masuk' => 'Token masuk tidak valid.']);
    }

    // Proses penyimpanan data absen masuk jika token valid
    // ...
}

    
}
