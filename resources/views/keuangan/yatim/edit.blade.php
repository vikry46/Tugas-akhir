@extends('layouts.backend')

@section('title')
    Keuangan | {{ config('app.name') }}
@endsection

@section('title-page')
    Keuangan-Yatim
@endsection

@section('content-header')
<div class="card">
    <div class="card-header" style="background-color: black; color:white">
        <center><h2 class="card-title" style="color:aliceblue">Pastikan Anda Mengubah Data Dengan Benar</h2></center>
    </div>
<form action="{{ route('yatim.update',['yatim'=>$jinan]) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
        <div class="form-group">

            <div class="container">
                <label for="tgl">
                    Tanggal
                </label>
                <input type="date" id="tgl" name="tgl" value="{{ old('tgl',$jinan->tgl) }}" class="form-control @error('tgl') is-invalid @enderror" placeholder="ubah tanggal">
                @error('tgl')
                    <label style="color: gold">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <div class="container">
                    <label for="id_pengurus">Penulis</label>
                    <div class="form-group">
                        <select class="form-control @error('id_pengurus') is-invalid @enderror" id="id_pengurus" name="id_pengurus">
                           <option>Pilih Penulis</option>
                            @foreach ($marsha as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $jinan->id_pengurus) selected @endif>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_pengurus')
                            <label style="color: red">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="container">
                <label for="pemasukan">
                    Pemasukan
                </label>
                <input type="text" id="pemasukan" name="pemasukan" value="{{ old('pemasukan',$jinan->pemasukan) }}" class="form-control @error('pemasukan') is-invalid @enderror" placeholder="ubah">
                @error('pemasukan')
                    <label style="color: gold">{{ $message }}</label>
                @enderror
            </div>

            <div class="container">
                <label for="pengeluaran">
                    Pengeluaran
                </label>
                <input type="text" id="pengeluaran" name="pengeluaran" value="{{ old('pengeluaran',$jinan->pengeluaran) }}" class="form-control @error('pengeluaran') is-invalid @enderror" placeholder="ubah">
                @error('pengeluaran')
                    <label style="color: gold">{{ $message }}</label>
                @enderror
            </div>

            <div class="container">
                <label for="keterangan">
                    Kekterangan
                </label>
                <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan',$jinan->keterangan) }}" class="form-control @error('keterangan') is-invalid @enderror" placeholder="ubah">
                @error('keterangan')
                    <label style="color: gold">{{ $message }}</label>
                @enderror
            </div>

            <div class="container">
            <a href="" class="btn btn-dark my-3 float-end mx-2">Kembali</a>
            <button type="submit" class="btn btn-secondary my-3 float-end">Edit</button>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
