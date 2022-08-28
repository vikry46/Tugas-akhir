@extends('layouts.backend')

@section('title')
    Lacon | {{ config('app.name') }}
@endsection

@section('title-page')
    Pengisi Acara
@endsection

@section('content-header')
<div class="card">
    <form action="{{ route('jeniskegiatan.update',['jeniskegiatan' => $deldel]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="container">

            <div class="form-group">
                <label for="jenis_kegiatan">

                </label>
                <input type="text" id="kode" name="jenis_kegiatan" value="{{ old('jenis_kegiatan',$deldel->jenis_kegiatan) }}" class="form-control @error('jenis_kegiatan') is-invalid @enderror" placeholder="Masukan Jenis kegiatan">
                @error('jenis_kegiatan')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>

        </div>
        <a href="{{ route('jeniskegiatan.index') }}" class="btn btn-dark">Kembali</a>
        <button type="submit" class="btn btn-primary my-2">Simpan</button>
    </form>
</div>
@endsection