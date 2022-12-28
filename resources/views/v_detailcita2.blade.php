@extends('layout.v_template')

@section('title', 'Detail')
@section('content')

<h1>Detail Cita-Cita</h1>

<table class="table">
    <tr>
        <th width="200px">Jenis Cita-Cita</th>
        <th width='30px'>:</th>
        <th>{{ $CitaCita->jenis_cita2}}</th>
    </tr>
    <tr>
        <th width="200px">Nama Cita-Cita</th>
        <th width='30px'>:</th>
        <th>{{ $CitaCita->nama_cita2}}</th>
    </tr>
    <tr>
        <th width="200px">Untuk Siapa</th>
        <th width='30px'>:</th>
        <th>{{ $CitaCita->untukSiapa}}</th>
    </tr>
    <tr>
        <th width="200px">Foto</th>
        <th width='30px'>:</th>
        <th><img src="{{ url('foto_citacita/'. $CitaCita->foto_cita2)}}" width='450px'></th>
    </tr>
    <tr>
        <th> <a href="/cita-cita" class="btn btn-success tbn-sm">Kembali</a></th>
    </tr>
</table>


@endsection
