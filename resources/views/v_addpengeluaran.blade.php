@extends('layout.v_template')

@section('title', 'Add Cita-Cita')
@section('content')

<form action="/pengeluaran/insert" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-5">
                <div class="form=group">
                    <label>Jenis Pengeluaran</label>
                    <input name="jenis_pengeluaran" class="form-control" value="{{ old('jenis_pengeluaran')}}">
                    <div class="text-danger">
                        @error('jenis_pengeluaran')
                            {{ $message}}
                        @enderror
                      </div>
                </div>

                <div class="form=group">
                    <label>Deskripsi Pengeluaran</label>
                    <input name="deskripsi_pengeluaran" class="form-control" value="{{ old('deskripsi_pengeluaran')}}">
                    <div class="text-danger">
                        @error('deskripsi_pengeluaran')
                            {{ $message}}
                        @enderror
                      </div>
                </div>
                <div class="form=group">
                    <label>Nominal</label>
                    <input name="nominal" class="form-control" value="{{ old('nominal')}}">
                    <div class="text-danger">
                        @error('nominal')
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
