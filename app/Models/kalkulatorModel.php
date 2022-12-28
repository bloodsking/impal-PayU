<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kalkulatorModel extends Model
{
    public function alldata(){
        return DB::table('tb_calculator')->where('id', auth()->user()->id)->get();
    }
    public function addData($data){
        DB::table('tb_calculator')->insert($data);
    }
    public function detailData($calculator_id){
        return DB::table('tb_calculator')->where('calculator_id', $calculator_id)->first();
    }
    public function deleteData($calculator_id){
        DB::table('tb_calculator')
            ->where('calculator_id', $calculator_id)
            ->delete();
    }
}
