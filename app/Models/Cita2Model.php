<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cita2Model extends Model
{
    public function allData(){
        return DB::table('tb_citacita')->where('id', auth()->user()->id)->get();
    }

    public function detailData($citacita_id){
        return DB::table('tb_citacita')->where('citacita_id', $citacita_id)->first();
    }

    public function addData($data){
        DB::table('tb_citacita')->insert($data);
    }

    public function editData($citacita_id, $data){
        DB::table('tb_citacita')->where('citacita_id', $citacita_id)->update($data);
    }

    public function deleteData($citacita_id){
        DB::table('tb_citacita')
            ->where('citacita_id', $citacita_id)
            ->delete();
    }
}
