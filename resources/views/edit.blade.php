@extends('layout\master')
@section('judul','Edit Data Konsumen')

@section('conten')
    <div class="container">
        <h2>Edit DataKonsumen</h2>

        <form action="/datakonsumen/{{ $konsumen->id }}" method="POST">
            @method('put')
            @csrf
            {{-- "disabled" untuk menggunci fungsi edit di form edit--}}
            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $konsumen->nama }}"><br>
            <input type="email" class="form-control" name="email" placeholder="e-mail" value="{{ $konsumen->email }}"><br>
            <input type="text" class="form-control" name="no_hp" placeholder="No Hp" value="{{ $konsumen->no_hp }}" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"><br>
            <textarea class="form-control" name="alamat" rows="5" placeholder="Alamat" >{{ $konsumen->alamat }}</textarea><br>
            <input class="btn btn-success mb-3" type="submit" name="submit" value="Save">
        </form>
    </div>
@endsection
