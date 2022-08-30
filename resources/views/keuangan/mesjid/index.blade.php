@extends('layouts.backend')

@section('title')
    Keuangan Mesjid | {{ config('app.name') }}
@endsection

@section('title-page')
    Keuangan Mesjid
@endsection

@section('content-header')
<center><h2>Form Keuangan Sosial</h2></center>
<a href="{{ route('mesjid.create') }}" class="btn btn-secondary">Tambah Data</a>
<div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
      <table class="table align-items-center mb-0 table-dark">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Penulis</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pemasukan Kas</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pengeluaran Kas</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
            <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Apsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($AziziShafaaAsadel as $sah )
          <tr>
          <td scope="row" class="text-center">{{ $loop->iteration }}</td>
          <td class="text-center">{{ $sah->tgl }}</td>
          <td class="text-center">{{ $sah->pengurus->nama }}</td>
          <td class="text-center">{{ $sah->pemasukan }}</td>
          <td class="text-center">{{ $sah->pengeluaran }}</td>
          <td class="text-center">{{ $sah->keterangan }}</td>
          <td class="text-center">
            <a href="{{ route('mesjid.edit',['mesjid'=>$sah]) }}" class="btn btn-primary btn-sm">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('mesjid.destroy', ['mesjid' => $sah]) }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apa kamu yakin menghapus data ini,,  Nah Ayoloh')">
                  <i class="fas fa-trash"></i>
                </button>
            </form>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection