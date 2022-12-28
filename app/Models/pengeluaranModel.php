<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class pengeluaranModel extends Model
{

    public function alldata(){
        return DB::table('tb_pengeluaran')->where('id', auth()->user()->id)->get();
    }
    public function addData($data){
        DB::table('tb_pengeluaran')->insert($data);
    }
    public function detailData($pengeluaran_id){
        return DB::table('tb_pengeluaran')->where('pengeluaran_id', $pengeluaran_id)->first();
    }
    public function deleteData($pengeluaran_id){
        DB::table('tb_pengeluaran')
            ->where('pengeluaran_id', $pengeluaran_id)
            ->delete();
    }
    public function getPengeluaran(){
        return $this->alldata()->sum(DB::raw('nominal'));
    }
}
