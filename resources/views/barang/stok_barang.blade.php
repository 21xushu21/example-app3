@extends('layout.master')

@section('conten')
    <div class="container">
        <a class="btn btn-primary" href={{ 'createbarang' }}>add barang</a>
        <h2>Data Konsumen</h2>
        <table class="table table-striped">
            <thead class="table-dark" style="text-align: center;">
                <th>No</th>
                <th>Nama</th>
                <th>stok</th>
                <th>terjual</th>
                <th>Harga Satuan</th>
                <th colspan="2">Aksi</th>
            </thead>
            @foreach ( $barang as $br)
            <tbody>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $br->nama_barang }}</td>
                <td>{{ $br->jumlah_stok }}</td>
                <td>{{ $br->jumlah_terjual }}</td>
                <td>{{ $br->harga_satuan }}</td>
                <td>
                    <a class="btn btn-secondary" href="/stok/{{ $br->id }}/edit">edit</a>
                </td>
                <td>
                    <form action="/datakonsumen/{{ $br->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <input class="btn btn-danger" type="submit" value="Dalete">
                    </form>
                </td>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
