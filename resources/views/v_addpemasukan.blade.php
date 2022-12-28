@extends('layout.v_template')

@section('title', 'Pemasukan')
@section('content')

<form action="/pemasukan/insert" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-5">
                <div class="form=group">
                    <label>Asal Pemasukan</label>
                    <input name="asal_pemasukan" class="form-control" value="{{ old('asal_pemasukan')}}">
                    <div class="text-danger">
                        @error('asal_pemasukan')
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
