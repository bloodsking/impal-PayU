<?php

namespace App\Http\Controllers;

use App\Models\Cita2Model;
use Illuminate\Http\Request;
use App\Models\users;

class Cita2Controller extends Controller
{

    public function __construct(){
        $this->Cita2Model = new Cita2Model();
        $this->middleware('auth');
    }

    public function index(){
        $data = [
            'CitaCita' => $this->Cita2Model->allData(),
        ];

        return view('v_cita-cita', $data);
    }

    public function detail($citacita_id){

        if(! $this->Cita2Model->detailData($citacita_id)){
            abort(404);
        }
        $data = [
            'CitaCita' => $this->Cita2Model->detailData($citacita_id),
        ];

        return view('v_detailcita2', $data);
    }

    public function add(){
        return view('v_addcitacita');
    }
    public function insert(){
        Request()->validate([
            'jenis_cita2' => 'required|min:3|max:30',
            'nama_cita2' => 'required|min:4|max:50',
            'untukSiapa' => 'required|min:3|max:50',
            'foto_cita2' => 'required|mimes:jpg,png,jpeg|max:16000',
        ], [
            'jenis_cita2.required' => 'Kolom ini wajib diisi !!!',
            'nama_cita2.required' => 'Kolom ini wajib diisi !!!',
            'untukSiapa.required' => 'Kolom ini wajib diisi !!!',
            'foto_cita2.required' => 'Kolom ini wajib diisi !!!',
            'jenis_cita2.min' => 'Minimal 3 Karakter !!!',
            'jenis_cita2.max' => 'Maksimal 30 Karakter !!!',
            'nama_cita2.min' => 'Minimal 4 Karakter !!!',
            'nama_cita2.max' => 'Maksimal 50 Karakter !!!',
            'untukSiapa.max' => 'Maksimal 50 Karakter !!!',
            'untukSiapa.min' => 'Maksimal 3 Karakter !!!'
        ]
        );

        $file = Request()->foto_cita2;
        $fileName = Request()->nama_cita2.'.'.$file->extension();
        $file->move(public_path('foto_citacita'), $fileName);

        $data = [
            'jenis_cita2' => Request()->jenis_cita2,
            'nama_cita2' => Request()->nama_cita2,
            'untukSiapa' => Request()->untukSiapa,
            'foto_cita2' => $fileName,
            'id' => (auth()->user()->id)
        ];

        $this->Cita2Model->addData($data);
        return redirect()->route('citacita')->with('msg', 'Data Berhasil Di Tambahkan !!');
    }

    public function edit($citacita_id){
        if(! $this->Cita2Model->detailData($citacita_id)){
            abort(404);
        }
        $data = [
            'CitaCita' => $this->Cita2Model->detailData($citacita_id),
        ];
        return view('v_editcitacita', $data);
    }

    public function update($citacita_id){
        Request()->validate([
            'nama_cita2' => 'required|min:4|max:50',
            'untukSiapa' => 'required|min:3|max:50',
            'foto_cita2' => 'mimes:jpg,png,jpeg|max:16000',
        ], [
            'jenis_cita2.required' => 'Kolom ini wajib diisi !!!',
            'nama_cita2.required' => 'Kolom ini wajib diisi !!!',
            'untukSiapa.required' => 'Kolom ini wajib diisi !!!',
            'nama_cita2.min' => 'Minimal 4 Karakter !!!',
            'nama_cita2.max' => 'Maksimal 50 Karakter !!!',
            'untukSiapa.max' => 'Maksimal 50 Karakter !!!',
            'untukSiapa.min' => 'Maksimal 3 Karakter !!!',
            'foto_cita2.mimes' => 'JPG, PNG, JPEG Format Only !!!'
        ]
        );

        if (Request()->foto_cita2 <> ""){
            $file = Request()->foto_cita2;
            $fileName = Request()->nama_cita2.'.'.$file->extension();
            $file->move(public_path('foto_citacita'), $fileName);

            $data = [
                'jenis_cita2' => Request()->jenis_cita2,
                'nama_cita2' => Request()->nama_cita2,
                'untukSiapa' => Request()->untukSiapa,
                'foto_cita2' => $fileName,
            ];

            $this->Cita2Model->editData($citacita_id, $data);
        }else{
            $data = [
                'jenis_cita2' => Request()->jenis_cita2,
                'nama_cita2' => Request()->nama_cita2,
                'untukSiapa' => Request()->untukSiapa,

            ];
            $this->Cita2Model->editData($citacita_id, $data);
        }

        return redirect()->route('citacita')->with('msg', 'Data Berhasil Di Update !!');
    }

    public function delete($citacita_id){

        $citacita = $this->Cita2Model->detailData($citacita_id);

        if ($citacita->foto_cita2 <> ""){
            unlink(public_path('foto_citacita') . '/'. $citacita->foto_cita2);
        }

        $this->Cita2Model->deleteData($citacita_id);
        return redirect()->route('citacita')->with('msg', 'Data Berhasil Di Hapus !!');

    }

    //public function users(){
    //    $users = users::all();
    //    return view('v_cita-cita', ['users' => $users]);
    //}


}
