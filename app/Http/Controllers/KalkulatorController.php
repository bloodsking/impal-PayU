<?php

namespace App\Http\Controllers;
use App\Models\kalkulatorModel;
use Illuminate\Http\Request;

class KalkulatorController extends Controller
{

    public function __construct(){
        $this->kalkulatorModel = new kalkulatorModel();
        $this->middleware('auth');
    }
    //
    public function index(){
        $data = [
            'cicil' => $this->kalkulatorModel->alldata()
        ];
        return view('v_kalkulator', $data);
    }

    public function add(){
        return view('v_addcicilan');
    }

    public function insert(){
        Request()->validate([
            'nama_citacita' => 'required|min:3|max:30',
            'harga_citacita' => 'integer|required|min:3|max:999999999',
            'lama_menabung' => 'integer|required|min:1|max:10000000'
        ],[
            'harga_citacita.integer' => 'Kolom harus berisi angka',
            'lama_menabung.integer' => 'Kolom harus berisi angka',
            'nama_citacita.required' => 'Kolom ini wajib diisi !!!',
            'harga_citacita.required' => 'Kolom ini wajib diisi !!!',
            'lama_menabung.required' => 'Kolom ini wajib diisi !!!',
            'lama_menabung.min' => 'Minimal 1 Karakter !!!',
            'lama_menabung.max' => 'Maksimal 100000000 Karakter !!!',
            'harga_citacita.min' => 'Minimal 3 Karakter !!!',
            'harga_citacita.max' => 'Maksimal 999999999 Karakter !!!',
            'nama_citacita.min' => 'Minimal 3 Karakter !!!',
            'nama_citacita.max' => 'Maksimal 30 Karakter !!!'
        ]
        );

        $pembagian = Request()->harga_citacita / Request()->lama_menabung;
        $data = [
            'nama_citacita' => Request()->nama_citacita,
            'harga_citacita' => Request()->harga_citacita,
            'lama_menabung' => Request()->lama_menabung,
            'cicil_citacita' => $pembagian,
            'id' => (auth()->user()->id)

        ];

        $this->kalkulatorModel->addData($data);
        return redirect()->route('kalkulator')->with('msg', 'Data Cicil Berhasil Ditambahkan !!');
    }

    public function delete($calculator_id){

        $kalkulator = $this->kalkulatorModel->detailData($calculator_id);

        $this->kalkulatorModel->deleteData($calculator_id);
        return redirect()->route('kalkulator')->with('msg', 'Data Berhasil Di Hapus !!');

    }

}
