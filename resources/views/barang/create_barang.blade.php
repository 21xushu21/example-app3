@extends('layout\master')
@section('judul','Create Stok')

@section('conten')
    <div class="container">
        <h2>Create barang</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/stok/store" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" name="nama_barang" placeholder="Nama" required><br>
                <input type="number" class="form-control" name="jumlah_stok" placeholder="Jumlah Stok" required onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"><br>
                <input type="number" class="form-control" name="jumlah_terjual" placeholder="Jumlah Terjual"><br>
                <input type="number" class="form-control" name="harga_satuan" placeholder="Rp" required onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"><br>
            </div>
            <input class="btn btn-success mb-3" type="submit" name="submit" value="Save">
        </form>
    </div>
@endsection
