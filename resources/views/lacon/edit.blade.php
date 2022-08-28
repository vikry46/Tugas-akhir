@extends('layouts.backend')

@section('title')
    Lacon | {{ config('app.name') }}
@endsection

@section('title-page')
    Pengisi Acara
@endsection

@section('content-header')
<div class="card">
    <form action="{{ route('lacon.update',['lacon' => $lacon]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container">

            <div class="form-group">
                <label for="nama">

                </label>
                <input type="text" id="kode" name="nama" value="{{ old('nama',$lacon->nama) }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama">
                @error('nama')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">

                </label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat',$lacon->alamat) }}" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat">
                @error('alamat')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">

                </label>
                <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan',$lacon->keterangan) }}" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan">
                @error('keterangan')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>

        </div>
        <a href="" class="btn btn-dark">Kembali</a>
        <button type="submit" class="btn btn-primary my-2">Simpan</button>
    </form>
</div>
@endsection