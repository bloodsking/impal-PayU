<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\pemasukanModel;
use App\Models\pengeluaranModel;
use PHPUnit\TextUI\XmlConfiguration\Php;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->pemasukanModel = new pemasukanModel();
        $this->pengeluaranModel = new pengeluaranModel();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'pemasukan' => $this->pemasukanModel->getPemasukan(),
            'pengeluaran' => $this->pengeluaranModel->getPengeluaran()
        ];
        return view('v_home', ['data' => $data]);
    }

}
