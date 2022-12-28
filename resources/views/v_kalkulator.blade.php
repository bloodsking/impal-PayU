@extends('layout.v_template')

@section('title', 'Kalkulator')
@section('content')
    <a href="/kalkulator/add" class="btn btn-primary btn-sm">Tambah Cicilan</a><br><br>

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
                <th>Nama Cita-Cita</th>
                <th>Harga</th>
                <th>Lama Menabung</th>
                <th>Biaya Cicil Per-Hari</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php $no=1; ?>
            @foreach ($cicil as $data)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $data->nama_citacita}}</td>
                    <td>IDR. {{ number_format($data->harga_citacita)}}-,</td>
                    <td>{{ $data->lama_menabung}} Hari</td>
                    <td>IDR. {{ number_format($data->cicil_citacita)}}-,</td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->calculator_id}}">
                            Delete
                          </button>
                    </td>
                </tr>
            @endforeach
        </tbody>


    @foreach ($cicil as $data)
    <div class="modal fade" id="delete{{$data->calculator_id}}">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$data->nama_citacita}} </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Cicilan {{$data->nama_citacita}}</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <a href="/kalkulator/delete/{{ $data->calculator_id}}"  class="btn btn-danger">Hapus</a>
            </div>
        </div>
        </div>
    </div>
  @endforeach
</table>
@endsection



