@extends('layouts.backend')

@section('title')
    Jenis Kegiatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Jenis 
@endsection

@section('content-header')
<div class="card">
    <form action="{{ route('yatim.store') }}" method="post">
        @csrf
        <div class="container">

            <div class="form-group">
                <label for="tgl">
                    Tanggal
                </label>
                <input type="date" id="tgl" name="tgl" value="{{ old('tgl') }}" class="form-control @error('tgl') is-invalid @enderror" placeholder="Masukan Tanggal Penulisan">
                @error('tgl')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                     <label for="id_pengurus">Penulis</label>
                    <div class="form-group">
                        <select class="form-control @error('id_pengurus') is-invalid @enderror" id="id_pengurus" name="id_pengurus">
                            <option>Pilih Penulis</option>
                            @foreach ($pengurus as $field)
                                <option value="{{ $field->id }}" {{ old('id_pengurus') == $field->id ? 'selected' : '' }}>{{ $field->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_pengurus')
                            <label style="color: red">{{ $message }}</label>
                        @enderror
                    </div>
            </div>

            <div class="form-group">
                <label for="pemasukan">
                    Pemasukan
                </label>
                <input type="text" id="pemasukan" name="pemasukan" class="form-control @error('pemasukan') is-invalid @enderror" placeholder="Tulisakan Pemasukan">
                @error('pemasukan')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <label for="pengeluaran">
                    Pengeluaran
                </label>
                <input type="text" id="pengeluaran" name="pengeluaran" class="form-control @error('pengeluaran') is-invalid @enderror" placeholder="Tuliskan Pengeluaran">
                @error('pengeluaran')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">
                    Keterangan
                </label>
                <input type="text" id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan Alasan ">
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