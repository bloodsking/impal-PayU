<?php

namespace App\Http\Controllers;
use App\Models\pemasukanModel;
use Illuminate\Http\Request;

class pemasukanController extends Controller
{
    public function __construct(){
        $this->pemasukanModel = new pemasukanModel();
        $this->middleware('auth');
    }
    //
    public function index(){

        $data = [
            'pemasukan' => $this->pemasukanModel->alldata()
        ];
        return view('v_pemasukan', $data);
    }

    public function add(){
        return view('v_addpemasukan');
    }

    public function insert(){

        Request()->validate([
            'asal_pemasukan' => 'required|min:3|max:30',
            'nominal' => 'integer|required|min:3|max:9999999999999999'
        ],[
            'asal_pemasukan.required' => 'Kolom ini wajib diisi !!!',
            'asal_pemasukan.min' => 'Minimal 3 digit',
            'asal_pemasukan.max' => 'Maksimal 30 digit',
            'nominal.integer' => 'Kolom harus berisi angkat',
            'nominal.required' => 'Kolom ini wajib diisi !!!',
            'nominal.min' => 'Minimal 3 digit',
            'nominal.max' => 'Maksimal 9999999999999 digit'
        ]);

        $data = [
            'asal_pemasukan' => Request()->asal_pemasukan,
            'nominal' => Request()->nominal,
            'id' => (auth()->user()->id)
        ];

        $this->pemasukanModel->addData($data);
        return redirect()->route('pemasukan')->with('msg', 'Data Pemasukan Berhasil Ditambahkan !!');
    }

    public function delete($pemasukan_id){

        $this->pemasukanModel->deleteData($pemasukan_id);
        return redirect()->route('pemasukan')->with('msg', 'Data Berhasil Di Hapus !!');

    }
}
