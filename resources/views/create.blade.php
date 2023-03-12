@extends('layout\master')
@section('judul','Create data konsumen')

@section('conten')
    <div class="container">
       
        <h2>Create Konsumen</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/datakonsumen/store" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" name="nama" placeholder="Nama" required><br>
                <input type="email" class="form-control" name="email" placeholder="e-mail" required><br>
                <input type="text" class="form-control" name="no_hp" placeholder="No Hp" required ><br>
                <textarea class="form-control" rows="3" name="alamat" rows="11" placeholder="Alamat" required></textarea><br>
            </div>
            <input class="btn btn-success mb-3" type="submit" name="submit" value="Save">
        </form>

    </div>
@endsection
