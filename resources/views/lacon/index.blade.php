@extends('layouts.backend')

@section('title')
    Lacon | {{ config('app.name') }}
@endsection

@section('title-page')
    Lacon
@endsection

@section('content-header')
<center><h2>Form Pemeran</h2></center>
<a href="{{ route('lacon.create') }}" class="btn btn-secondary">Tambah Data</a>
<div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
      <table class="table align-items-center mb-0 table-dark">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
            <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Apsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($lacon as $del)
          <tr>
          <td scope="row" class="text-center">{{ $loop->iteration }}</td>
          <td class="text-center">{{ $del->nama }}</td>
          <td class="text-center">{{ $del->alamat }}</td>
          <td class="text-center">{{ $del->keterangan }}</td>
          <td class="text-center">
            <a href="{{ route('lacon.edit', ['lacon' => $del]) }}" class="btn btn-primary btn-sm">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('lacon.destroy', ['lacon' => $del]) }}" method="POST" class="d-inline">
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