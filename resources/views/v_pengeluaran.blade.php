@extends('layout.v_template')


@section('title', 'Pengeluaran')
@section('content')

<a href="/pengeluaran/add" class="btn btn-primary btn-sm">Tambah Pengeluaran</a><br><br>

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
            <th>Jenis Pengeluaran</th>
            <th>Deskripsi Pengeluaran</th>
            <th>Nominal</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $no=1; ?>
        @foreach ($pengeluaran as $data)
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $data->jenis_pengeluaran}}</td>
                <td>{{ $data->deskripsi_pengeluaran}}</td>
                <td>IDR. {{ number_format($data->nominal)}}-,</td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->pengeluaran_id}}">
                        Delete
                      </button>
                </td>
            </tr>
        @endforeach
    </tbody>

    @foreach ($pengeluaran as $data)
        <div class="modal fade" id="delete{{$data->pengeluaran_id}}">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{$data->deskripsi_pengeluaran}} </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Ingin Menghapus List Pengeluaran Untuk {{$data->deskripsi_pengeluaran}}</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="/pengeluaran/delete/{{ $data->pengeluaran_id}}"  class="btn btn-danger">Hapus</a>
                </div>
            </div>
            </div>
        </div>
      @endforeach
</table>

@endsection
