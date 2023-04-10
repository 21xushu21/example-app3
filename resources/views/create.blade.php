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
                <div class="mb-3">
                    <input accept=".jpg,.png,.jpg" type="file" name="foto" class="form-control" aria-label="file example" required>
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                  </div>
                <input type="text" class="form-control" name="nama" placeholder="Nama" required><br>
                <input type="email" class="form-control" name="email" placeholder="e-mail" required><br>
                <input type="text" class="form-control" name="no_hp" placeholder="No Hp" required /\b([0-9]|10)\b /><br>
                <textarea class="form-control" rows="3" name="alamat" rows="11" placeholder="Alamat" required></textarea><br>
            </div>
            <input class="btn btn-success mb-3" type="submit" name="submit" value="Save">
        </form>

    </div>
@endsection
