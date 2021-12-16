<?php

namespace App\Http\Controllers;

use App\Models\PendudukModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendudukController extends Controller
{
    public function index()
    {
        $data = [
            'penduduk' => $this->PendudukModel->allData(),
        ];
        return view('layout.penduduk', $data);
    }

    public function __construct()
    {
        $this->User = new User();
        $this->PendudukModel = new PendudukModel();
    }

    // Add data
    public function add(){
        $data = [
            'penduduk' => $this->PendudukModel->tambah(),
            'user' => $this->User->allData(),
        ];
        return view('layout.addPenduduk', $data);
    }

    // Simpan Data
    public function simpan(){
        Request()->validate([
            'id' => 'required|unique:penduduks,id',
            'nama' => 'required',
            'jk' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:1024',
        ]);

        //upload gambar
        $file = Request()->foto;
        $fileName = Request()->id_penduduk.'.'.$file->extension();
        $file->move(public_path('foto_ktp'), $fileName);

        $data = [
            'id' => Request()->id,
            'nama' => Request()->nama,
            'jk' => Request()->jk,
            'no_telpon' => Request()->no_telpon,
            'alamat' => Request()->alamat,
            'foto' => $fileName,
        ];

        $this->PendudukModel->addData($data);
        return redirect()->route('penduduk')->with('pesan','Data Berhasil Ditambahkan');
    }

    // Search data
    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'penduduk' => DB::table('penduduks')
            ->join('users', 'users.id', '=', 'penduduks.id')
            ->where('nama','like',"%".$cari."%")
            ->orWhere('nik','like',"%".$cari."%")
            ->orWhere('no_telpon','like',"%".$cari."%")
            ->paginate(5),
        ];


        // mengirim data pegawai ke view index
        return view('layout.penduduk', $data);
    }

    // edit
    public function edit($id_penduduk){
        $data = [
            'penduduk' => $this->PendudukModel->detailData($id_penduduk),
        ];
        return view('layout.pendudukEdit', $data);
    }
    // update
    public function update($id_penduduk){
        Request()->validate([
            'nama' => 'required',
            'jk' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:1024',
        ]);

        //upload gambar
        $file = Request()->foto;
        $fileName = Request()->id_penduduk.'.'.$file->extension();
        $file->move(public_path('foto_ktp'), $fileName);

        $data = [
            'nama' => Request()->nama,
            'jk' => Request()->jk,
            'no_telpon' => Request()->no_telpon,
            'alamat' => Request()->alamat,
            'foto' => $fileName,
        ];

        $this->PendudukModel->editData($id_penduduk ,$data);
        return redirect()->route('penduduk')->with('pesan','Data Berhasil Diperbarui');
    }

    // delete
    public function delete($id_penduduk){
        $this->PendudukModel->deleteData($id_penduduk);
        return redirect()->route('penduduk')->with('pesan','Data Berhasil Dihapus');
    }

    // Detail
    public function detail($id_penduduk)
    {
        $data = [
            'penduduk' => $this->PendudukModel->detailData($id_penduduk),
        ];
        return view('layout.mahasiswaDetail', $data);
    }
}
