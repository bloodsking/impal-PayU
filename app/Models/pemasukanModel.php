<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class pemasukanModel extends Model
{
    public function alldata(){
        return DB::table('tb_pemasukan')->where('id', auth()->user()->id)->get();
    }
    public function addData($data){
        DB::table('tb_pemasukan')->insert($data);
    }
    public function detailData($pemasukan_id){
        return DB::table('tb_pemasukan')->where('pemasukan_id', $pemasukan_id)->first();
    }
    public function deleteData($pemasukan_id){
        DB::table('tb_pemasukan')
            ->where('pemasukan_id', $pemasukan_id)
            ->delete();
    }

    public function getPemasukan(){
        return $this->alldata()->sum(DB::raw('nominal'));
    }
}
