@extends('layout.master')
@section('judul','datakonsumen')

@section('conten')
    <div class="container">
        <a class="btn btn-primary" href="/datakonsumen/create">add konsumen</a>
        <h2>Data Konsumen</h2>
        <table class="table table-striped">
            <thead class="table-dark" style="text-align: center;">
                <th>No</th>
                <th>Nama</th>
                <th>e-mail</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th colspan="2">Aksi</th>
            </thead>
            @foreach ( $konsumen as $k)
            <tbody>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->email }}</td>
                <td>{{ $k->no_hp }}</td>
                <td>{{ $k->alamat }}</td>
                <td>
                    <a class="btn btn-secondary" href="/datakonsumen/{{ $k->id }}/edit">edit</a>
                </td>
                <td>
                    <form action="/datakonsumen/{{ $k->id }}" method="POST">
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
