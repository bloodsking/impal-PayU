@extends('layout.v_template')

@section('title', 'Cicilan')
@section('content')

<h2>Tambahkan Cicilan</h2>
<form action="/kalkulator/insert" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-5">
                <div class="form=group">
                    <label>Nama Cicilan</label>
                    <input name="nama_citacita" class="form-control" value="{{ old('nama_citacita')}}">
                    <div class="text-danger">
                        @error('nama_citacita')
                            {{ $message}}
                        @enderror
                      </div>
                </div>

                <div class="form=group">
                    <label>Harga Cita-Cita</label>
                    <input name="harga_citacita" class="form-control" value="{{ old('harga_citacita')}}">
                    <div class="text-danger">
                        @error('harga_citacita')
                            {{ $message}}
                        @enderror
                      </div>
                </div>

                <div class="form=group">
                    <label>Lama Menabung</label>
                    <input name="lama_menabung" class="form-control" value="{{ old('lama_menabung')}}">
                    <div class="text-danger">
                        @error('lama_menabung')
                            {{ $message}}
                        @enderror
                      </div>
                </div>
                <br>
                <div class="form=group">
                    <button class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
