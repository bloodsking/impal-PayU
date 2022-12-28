@extends('layout.v_template')

@section('title', 'Cita-Cita')
@section('content')
    <a href="/cita-cita/add" class="btn btn-primary btn-sm">Add Wishlist</a><br><br>

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
                <th>Jenis Cita-Cita </th>
                <th>Nama Cita-Cita </th>
                <th>Untuk Siapa </th>
                <th>Foto Cita-Cita</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($CitaCita as $data)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $data->jenis_cita2}}</td>
                    <td>{{ $data->nama_cita2}}</td>
                    <td>{{ $data->untukSiapa}}</td>
                    <td><img src="{{ url('foto_citacita/'.$data->foto_cita2)}}" width = '150px'></td>
                    <td>
                        <a href="/cita-cita/detail/{{$data->citacita_id}}" class="btn btn-sm btn-success">Detail</a>
                        <a href="/cita-cita/edit/{{$data->citacita_id}}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->citacita_id}}">
                            Delete
                          </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($CitaCita as $data)
        <div class="modal fade" id="delete{{$data->citacita_id}}">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{$data->untukSiapa}} </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Ingin Menghapus Cita-Cita Untuk {{$data->untukSiapa}}</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="/cita-cita/delete/{{ $data->citacita_id}}"  class="btn btn-danger">Hapus</a>
                </div>
            </div>
            </div>
        </div>
      @endforeach

@endsection
