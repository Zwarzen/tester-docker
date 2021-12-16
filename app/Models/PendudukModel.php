<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PendudukModel extends Model
{
    public function allData(){
        return DB::table('penduduks')
        ->join('users', 'users.id', '=', 'penduduks.id')
        ->paginate(5);
    }
    public function addData($data){
        DB::table('penduduks')->insert($data);
    }
    public function detailData($id_penduduk){
        return DB::table('penduduks')->where('id_penduduk', $id_penduduk)
        ->join('users', 'users.id', '=', 'penduduks.id')
        ->first();

    }
    public function editData($id_penduduk, $data){
        DB::table('penduduks')->where('id_penduduk', $id_penduduk)->update($data);
    }
    public function deleteData($id_penduduk){
        DB::table('penduduks')->where('id_penduduk', $id_penduduk)->delete();
    }
    public function tambah(){
        return DB::table('penduduks')
        ->join('users', 'users.id', '=', 'penduduks.id')
        ->get();
    }

}
