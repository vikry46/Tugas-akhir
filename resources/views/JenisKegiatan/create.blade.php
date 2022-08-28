@extends('layouts.backend')

@section('title')
    Jenis Kegiatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Jenis 
@endsection

@section('content-header')
<div class="card">
    <form action="{{ route('jeniskegiatan.store') }}" method="post">
        @csrf
        <div class="container">

            <div class="form-group">
                <label for="jenis_kegiatan">
                    Jenis Kegiatan
                </label>
                <input type="text" id="kode" name="jenis_kegiatan" value="{{ old('jenis_kegiatan') }}" class="form-control @error('jenis_kegiatan') is-invalid @enderror" placeholder="Masukan Jenis Kegiatan">
                @error('jenis_kegiatan')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>

        </div>
        <a href="" class="btn btn-dark">Kembali</a>
        <button type="submit" class="btn btn-primary my-2">Simpan</button>
    </form>
</div>
@endsection