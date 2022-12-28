@extends('layout.v_template')

@section('title', 'Edit Wishlist')
@section('content')

<form action="/cita-cita/update/{{ $CitaCita->citacita_id}}" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-5">
                <div class="form=group">
                    <label>Jenis Cita-Cita</label>
                    <input name="jenis_cita2" class="form-control" value="{{ $CitaCita->jenis_cita2}}" readonly>
                    <div class="text-danger">
                        @error('jenis_cita2')
                            {{ $message}}
                        @enderror
                      </div>
                </div>

                <div class="form=group">
                    <label>Nama Cita-Cita</label>
                    <input name="nama_cita2" class="form-control" value="{{ $CitaCita->nama_cita2}}">
                    <div class="text-danger">
                        @error('nama_cita2')
                            {{ $message}}
                        @enderror
                      </div>
                </div>

                <div class="form=group">
                    <label>Untuk Siapa</label>
                    <input name="untukSiapa" class="form-control" value="{{ $CitaCita->untukSiapa}}">
                    <div class="text-danger">
                        @error('untukSiapa')
                            {{ $message}}
                        @enderror
                      </div>
                </div>

                <div class="col-sm 12">
                    <div class="col-sm 6">
                        <img src="{{ url('foto_citacita/'. $CitaCita->foto_cita2)}}" width='450px'>
                    </div>
                    <div class="form=group">
                        <label>Ganti Foto Cita-Cita</label>
                        <input type="file" name="foto_cita2" class="form-control">
                        <div class="text-danger">
                            @error('foto_cita2')
                                {{ $message}}
                            @enderror
                          </div>
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
