<?php

namespace App\Http\Controllers;

use App\Models\PendudukModel;
use App\Models\WilayahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    public function index()
    {
        $data = [
            'wilayah' => $this->WilayahModel->allData(),
        ];
        return view('layout.wilayah', $data);
    }

    public function __construct()
    {
        $this->WilayahModel = new WilayahModel();
        $this->PendudukModel = new PendudukModel();
    }

    // Add data
    public function add(){
        $data = [
            'wilayah' => $this->WilayahModel->tambah(),
            'penduduk' => $this->PendudukModel->allData(),
        ];
        return view('layout.addWilayah', $data);
    }

    // Simpan Data
    public function simpan(){
        Request()->validate([
            'id_penduduk' => 'required',
            'nama_daerah' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'alasan' => 'required',
            'tanggal' => 'required',
        ]);

        $data = [
            'id_penduduk' => Request()->id_penduduk,
            'nama_daerah' => Request()->nama_daerah,
            'alamat' => Request()->alamat,
            'kelurahan' => Request()->kelurahan,
            'kecamatan' => Request()->kecamatan,
            'alasan' => Request()->alasan,
            'tanggal' => Request()->tanggal,

        ];

        $this->WilayahModel->addData($data);
        return redirect()->route('wilayah')->with('pesan','Data Berhasil Ditambahkan');
    }

    // Search data
    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'wilayah' => DB::table('regions')
            ->join('penduduks', 'penduduks.id_penduduk', '=', 'regions.id_penduduk')
            ->where('nama_daerah','like',"%".$cari."%")
            ->orWhere('kelurahan','like',"%".$cari."%")
            ->orWhere('kecamatan','like',"%".$cari."%")
            ->orWhere('nama','like',"%".$cari."%")
            ->paginate(5),
        ];


        // mengirim data pegawai ke view index
        return view('layout.wilayah', $data);
    }

    // edit
    public function edit($id_region){
        $data = [
            'wilayah' => $this->WilayahModel->detailData($id_region),
        ];
        return view('layout.wilayahEdit', $data);
    }
    // update
    public function update($id_region){
        Request()->validate([
            // 'id_penduduk' => 'required',
            'nama_daerah' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'alasan' => 'required',
            'tanggal' => 'required',
        ]);

        $data = [
            // 'id_penduduk' => Request()->id_penduduk,
            'nama_daerah' => Request()->nama_daerah,
            'alamat' => Request()->alamat,
            'kelurahan' => Request()->kelurahan,
            'kecamatan' => Request()->kecamatan,
            'alasan' => Request()->alasan,
            'tanggal' => Request()->tanggal,
        ];

        $this->WilayahModel->editData($id_region ,$data);
        return redirect()->route('wilayah')->with('pesan','Data Berhasil Diperbarui');
    }

    // delete
    public function delete($id_region){
        $this->WilayahModel->deleteData($id_region);
        return redirect()->route('wilayah')->with('pesan','Data Berhasil Dihapus');
    }

    // Detail
    public function detail($id_region)
    {
        $data = [
            'wilayah' => $this->WilayahModel->detailData($id_region),
        ];
        return view('layout.mahasiswaDetail', $data);
    }
}
