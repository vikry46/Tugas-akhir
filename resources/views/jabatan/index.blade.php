@extends('layouts.backend')

@section('title')
    Pengurus | {{ config('app.name') }}
@endsection

@section('title-page')
    Pengurus
@endsection

@section('content-header')
<center><h2>Form Jabatan</h2></center>
<a href="{{ route('jabatan.create') }}" class="btn btn-dark">Tambah Data</a>
<a href="{{ route('pengurus.index') }}" class="btn btn-secondary">Kembali</a>
<div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
      <table class="table align-items-center mb-0 table-dark">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama Kategori Jabatan</th>
            <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Apsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($jabatan as $zee)
          <tr>
          <td scope="row" class="text-center">{{ $loop->iteration }}</td>
          <td class="text-center">{{ $zee->nama_kategori }}</td>
          <td class="text-center">
            <a href="{{ route('jabatan.edit', ['jabatan' => $zee]) }}" class="btn btn-primary btn-sm">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('jabatan.destroy', ['jabatan' => $zee]) }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apa kamu yakin menghapus data ini Nah Ayoloh')">
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
