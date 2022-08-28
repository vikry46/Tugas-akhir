@extends('layouts.backend')

@section('title')
    Pengurus | {{ config('app.name') }}
@endsection

@section('title-page')
    Pengurus 
@endsection

@section('content-header')
<h2><center>Pastikan Data Yang Di Edit Sudah Benar</center></h2>
@endsection
@section('content')
    <div class="card">
        <form action="{{ route('pengurus.update', ['penguru' => $pengurus]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="form-group">
            <div class="container">
                <label for="kode">
                        Kode Pengurus
                </label>
                <input type="text" id="kode" name="kode" value="{{ old('kode',$pengurus->kode) }}" class="form-control @error('kode') is-invalid @enderror" placeholder="Masukan Nomor Pengurus">
                @error('kode')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="container">
                <label for="id_jabatan">Jabatan</label>
                <div class="form-group">
                    <select class="form-control @error('id_jabatan') is-invalid @enderror" id="select_jabatan" name="id_jabatan">
                       <option>Pilih Jabatan</option>
                        @foreach ($jabatan as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $pengurus->id_jabatan) selected @endif>{{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('id_jabatan')
                        <label style="color: red">{{ $message }}</label>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="container">
                <label for="nama">
                        Nama Pengurus
                </label>
                <input type="text" id="nama" name="nama" value="{{ old('nama',$pengurus->nama) }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Pengurus">
                @error('nama')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>
        </div>
            <div class="form-group">
                <div class="container">
                    <label for="select_jk" class="font-weight-bold"> Jenis Kelamin </label>
    
                    <select name="jk" id="select_jk" data-placeholder="" class="custom-select w-100 form-control @error('jk') is-invalid @enderror">
                        <option value="{{ old('jk', $pengurus->jk) }}">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" @if (old('jk', $pengurus->jk) == "Laki-laki") {{ 'selected' }} @endif>Laki laki</option>
                        <option value="Perempuan" @if (old('jk', $pengurus->jk) == "Perempuan") {{ 'selected' }} @endif>Perempuan</option>
                    </select>
                @error('jk')
                <span style="color :gold">
                   <strong>
                       {{ $message }}
                   </strong>
                </span>
                @enderror
            </div>
            </div>
        <div class="form-group">
            <div class="container">
                <label for="umur">
                        Umur
                </label>
                <input type="text" id="umur" name="umur" value="{{ old('umur',$pengurus->umur) }}" class="form-control @error('umur') is-invalid @enderror" placeholder="Masukan Jumlah Umur">
                @error('umur')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="container">
                <label for="no_hp">
                        Nomor Hp
                </label>
                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp',$pengurus->no_hp) }}" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukan Jumlah Umur">
                @error('no_hp')
                    <label style="color gold">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="container">
                <label for="image"> 
                    Foto Karyawan
                </label>
                <input type="hidden" name="oldImage" value="{{ $pengurus->image}}">
                @if($pengurus->image)
                   <img src="{{ asset('storage/' . $pengurus->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                    <input type="file" name="image"  value="{{ old('image', $pengurus->image) }}" class="form-control @error('image') is-invalid @enderror" id="image" onchange="previewImage()" >
                @error('image')
                   <span style="color: gold">
                       <strong>
                           {{ $message }}
                       </strong>
                   </span>    
                @enderror
        </div>
        </div>
        <button type="submit" class="btn btn-primary my-2">Simpan</button>
        </form>
    </div>

    <script>
        function previewImage()
{
    const foto = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(foto.files[0]);

    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
}
</script>
@endsection

