@extends('dashboard')
@section('content')

<style>
    body {
        background: url('https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9640.jpg?w=900&t=st=1698697077~exp=1698697677~hmac=1a12d710da0136a68f348da615842a1d1f70266855cd129d10e3e012bf782d16');
        background-size: cover;
    }
</style>

<div class="content mt-4">
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-10">
            <div class="card" style="background-color: rgba(255, 255, 255, 0.8);">
                <div class="card-body">
                    <div class="wrap d-flex" style="justify-content: center;">
                        <div class="menu d-flex justify-content-center" style="background-color: rgba(119, 235, 184, 1); width: 30%; border-radius: 15px">
                            <h1>Edit Buku Saya</h1>
                        </div>
                    </div>
                    <form action="{{route('buku.update', $buku->id_buku)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label class="font-weightbold"><Strong>Judul</Strong></label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul', $buku->judul) }}" placeholder="Masukkan judul">
                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label class="font-weightbold">Penulis</label>
                                <input type="text" class="form-control @error('penulis') is-invalid @enderror" name="penulis" value="{{old('penulis', $buku->penulis) }}" placeholder="Masukkan penulis">
                                @error('penulis')
                                <div class="invalid-feedback">x
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection