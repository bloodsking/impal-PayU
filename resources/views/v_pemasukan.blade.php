@extends('layout.v_template')

@section('title', 'Pemasukan')
@section('content')

<a href="/pemasukan/add" class="btn btn-primary btn-sm">Tambah Pemasukan</a><br><br>

@if (session('msg'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Berhasil</h5>
    {{ session('msg')}}.
</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Asal Pemasukan</th>
            <th>Nominal</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $no=1; ?>
        @foreach ($pemasukan as $data)
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $data->asal_pemasukan}}</td>
                <td>IDR. {{ number_format($data->nominal)}}-,</td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->pemasukan_id}}">
                        Delete
                      </button>
                </td>
            </tr>
        @endforeach
    </tbody>


    @foreach ($pemasukan as $data)
        <div class="modal fade" id="delete{{$data->pemasukan_id}}">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{$data->asal_pemasukan}} </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Ingin Menghapus List pemasukan Untuk {{$data->asal_pemasukan}}</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="/pemasukan/delete/{{ $data->pemasukan_id}}"  class="btn btn-danger">Hapus</a>
                </div>
            </div>
            </div>
        </div>
      @endforeach
</table>

@endsection
