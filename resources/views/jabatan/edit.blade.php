@extends('layouts.backend')

@section('title')
    Pengurus | {{ config('app.name') }}
@endsection

@section('title-page')
    Pengurus
@endsection

@section('content-header')
<div class="card">
<center><h2>Pastikan Anda Mengubahnya Dengan Benar</h2></center>
<form action="{{ route('jabatan.update',['jabatan'=>$jabatan]) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
        <div class="form-group">
            <div class="container">
                <label for="nama_kategori">
                    Nama Kategori
                </label>
                <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori',$jabatan->nama_kategori) }}" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukan Nama Kategori">
                @error('nama_kategori')
                    <label style="color: gold">{{ $message }}</label>
                @enderror
                <a href="" class="btn btn-dark">Kembali</a>
                <button type="submit" class="btn btn-secondary">Edit</button>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
