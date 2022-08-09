@extends('layouts.backend')

@section('title')
    Jabatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Jabatan
@endsection

@section('content-header')
<div class="card">
<center><h2>Silahkan Inputkan Data</h2></center>
<form action="{{ route('jabatan.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <div class="container">
            <label for="nama_kategori">
                Nama Kategori
            </label>
            <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukan Nama Kategori">
            @error('nama_kategori')
                <label style="color: gold">{{ $message }}</label>
            @enderror
            
        
            <a href="" class="btn btn-dark">Kembali</a>
            <button type="submit" class="btn btn-secondary">Simpan</button>
        </div>
    </div>
</form>
</div>
@endsection
