<?php

namespace App\Http\Controllers;
use App\Models\pengeluaranModel;
use Illuminate\Http\Request;

class pengeluaranController extends Controller
{

    public function __construct(){
        $this->pengeluaranModel = new pengeluaranModel();
        $this->middleware('auth');
    }
    //
    public function index(){

        $data = [
            'pengeluaran' => $this->pengeluaranModel->alldata()
        ];
        return view('v_pengeluaran', $data);
    }

    public function add(){
        return view('v_addpengeluaran');
    }

    public function insert(){
        Request()->validate([
            'jenis_pengeluaran' => 'required|min:3|max:30',
            'deskripsi_pengeluaran' => 'required|min:3|max:99999',
            'nominal' => 'integer|required|min:1|max:99999999999999'
        ],[
            'nominal.integer' => 'Kolom harus berisi angka',
            'jenis_pengeluaran.required' => 'Kolom ini wajib diisi !!!',
            'deskripsi_pengeluaran.required' => 'Kolom ini wajib diisi !!!',
            'nominal.required' => 'Kolom ini wajib diisi !!!',
            'nominal.min' => 'Minimal 1 digit !!!',
            'nominal.max' => 'Maksimal 9999999999999 digit !!!',
            'deskripsi_pengeluaran.min' => 'Minimal 3 Karakter !!!',
            'deskripsi_pengeluaran.max' => 'Maksimal 99999 Karakter !!!',
            'jenis_pengeluaran.min' => 'Minimal 3 Karakter !!!',
            'jenis_pengeluaran.max' => 'Maksimal 30 Karakter !!!'
        ]
        );

        $data = [
            'jenis_pengeluaran' => Request()->jenis_pengeluaran,
            'deskripsi_pengeluaran' => Request()->deskripsi_pengeluaran,
            'nominal' => Request()->nominal,
            'id' => (auth()->user()->id)
        ];

        $this->pengeluaranModel->addData($data);
        return redirect()->route('pengeluaran')->with('msg', 'Data Pengeluaran Berhasil Ditambahkan !!');
    }

    public function delete($pengeluaran_id){

        $this->pengeluaranModel->deleteData($pengeluaran_id);
        return redirect()->route('pengeluaran')->with('msg', 'Data Berhasil Di Hapus !!');

    }

}
