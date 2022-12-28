@extends('layout.v_template')

@section('title', 'Home')
@section('content')

<h1>Halo {{ Auth::user()->name }}, berikut merupakan tabel keungan-mu</h1>
<br><br><br><br>
<table class="table table-bordered" style="width:800px; height:20px; margin-left:25%">
    <thead>
        <tr>
            <th class='masuk'>Total Pemasukan.</th>
            <th class='keluar'>Total Pengeluaran.</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($data as $data)
            <td class='total'>IDR. {{ number_format($data)}}-,</td>
        @endforeach
    </tbody>

</table>


@endsection
