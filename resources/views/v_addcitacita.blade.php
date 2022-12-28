@extends('layout.v_template')

@section('title', 'Add Cita-Cita')
@section('content')

<h2>Tambahkan Cita-Cita</h2>
<form action="/cita-cita/insert" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-5">
                <div class="form=group">
                    <label>Jenis Cita-Cita</label>
                    <input name="jenis_cita2" class="form-control" value="{{ old('jenis_cita2')}}">
                    <div class="text-danger">
                        @error('jenis_cita2')
                            {{ $message}}
                        @enderror
                      </div>
                </div>

                <div class="form=group">
                    <label>Nama Cita-Cita</label>
                    <input name="nama_cita2" class="form-control" value="{{ old('nama_cita2')}}">
                    <div class="text-danger">
                        @error('nama_cita2')
                            {{ $message}}
                        @enderror
                      </div>
                </div>

                <div class="form=group">
                    <label>Untuk Siapa</label>
                    <input name="untukSiapa" class="form-control" value="{{ old('untukSiapa')}}">
                    <div class="text-danger">
                        @error('untukSiapa')
                            {{ $message}}
                        @enderror
                      </div>
                </div>

                <div class="form=group">
                    <label>Foto Cita-Cita</label>
                    <input type="file" name="foto_cita2" class="form-control" value="{{ old('foto_cita2')}}">
                    <div class="text-danger">
                        @error('foto_cita2')
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
