<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class WilayahModel extends Model
{
    public function allData(){
        return DB::table('regions')
        ->join('penduduks', 'penduduks.id_penduduk', '=', 'regions.id_penduduk')
        ->paginate(5);
    }
    public function addData($data){
        DB::table('regions')->insert($data);
    }
    public function detailData($id_region){
        return DB::table('regions')->where('id_region', $id_region)
        ->join('penduduks', 'penduduks.id_penduduk', '=', 'regions.id_penduduk')
        ->first();
    }
    public function editData($id_region, $data){
        DB::table('regions')->where('id_region', $id_region)->update($data);
    }
    public function deleteData($id_region){
        DB::table('regions')->where('id_region', $id_region)->delete();
    }
    public function tambah(){
        return DB::table('regions')
        ->join('penduduks', 'penduduks.id_penduduk', '=', 'regions.id_penduduk')
        ->get();
    }
}
