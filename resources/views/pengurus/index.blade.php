@extends('layouts.backend')

@section('title')
    Pengurus | {{ config('app.name') }}
@endsection

@section('title-page')
    Pengurus
@endsection

@section('content-header')
<div class="row">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <a href="{{ route('pengurus.create') }}">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Input Data Pengurus</p>
                    <h5 class="font-weight-bolder">
                      مدير
                    </h5>
                </div>
              </a>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <a href="{{ route('jabatan.index') }}">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jabatan</p>
                    <h5 class="font-weight-bolder">
                      موقع
                    </h5>
                </div>
              </a>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('content')
<div class="card ">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">Anggota By Country</h6>
      </div>
    </div>
    <div class="table-responsive">
      <div class="container">
        <div class="row justify-content-center">
        @foreach ($zoya as $zee)
          <div class="col-lg-6">
            <div class="card mb-3" style="max-width: 340px; height:400px; background-color: grey; color: white">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="{{ asset('storage/' . $zee->image) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body ">
                      <h5 class="card-title"><center>{{ $zee->kode }}</center></h5>
                      <div class="row">
                        <div class="col-lg-5  col-sm-4">
                          <p class="card-text">Jabatan</p>
                          <p class="card-text">Nama</p>
                          <p class="card-text">Kelamin</p>
                          <p class="card-text">Umur</p>
                          <p class="card-text">No HP</p>
                        </div>
                        <div class="col-lg-2 col-sm-4">
                          <p class="card-text">:</p>
                          <p class="card-text">:</p>
                          <p class="card-text">:</p>
                          <p class="card-text">:</p>
                          <p class="card-text">:</p>
                        </div>
                        <div class="col-lg-5 col-sm-4">
                          <p class="card-text">{{ $zee->jabatan->nama_kategori }}</p>
                          <p class="card-text">{{ $zee->nama }}</p>
                          <p class="card-text">{{ $zee->jk}}</p>
                          <p class="card-text">{{ $zee->umur }}</p>
                          <p class="card-text">{{ $zee->no_hp }}</p>
                        </div>
                      </div>
                      <a href="{{ route('pengurus.edit',['penguru'=>$zee]) }}" class=" btn btn-sm btn-warning">Edit</a>
                     <form action="{{ route('pengurus.destroy', ['penguru' => $zee]) }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                     </form>
                    </div>
                </div>
              </div>
            </div>   
          </div> 
        @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
