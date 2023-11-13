@extends('dashboard')
@section('content')

<style>
    body {
        background: url('https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9640.jpg?w=900&t=st=1698697077~exp=1698697677~hmac=1a12d710da0136a68f348da615842a1d1f70266855cd129d10e3e012bf782d16');
        background-size: cover;
    }

    links {
        padding: 20px;
    }
</style>

<div class="wrap d-flex" style="justify-content: center;">
    <div class="menu d-flex justify-content-center mt-3" style="background-color: rgba(119, 235, 184, 1); width: 15%; border-radius: 15px">
        <h1>Buku di Pinjam</h1>
    </div>
</div>

<div class="content mt-4">
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-10">
            <div class="card" style="background-color: rgba(255, 255, 255, 0.8);">
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table class="table table-hover text-no-wrap">
                            <thead class="opacity:0.8;">
                                <tr class="table-secondary">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul Buku</th>
                                    <th class="text-center">Pengarang</th>
                                    <th class="text-center">Penerbit</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody style="opacity:0.8">
                                @forelse($dataBuku as $item)
                                <tr>
                                    <th class="text-center" style="padding: 20px;"><strong>{{$loop->iteration}}.</strong></th>
                                    <td class="text-center" style="padding: 20px;">{{$item->judul}}</td>
                                    <td class="text-center" style="padding: 20px;">{{$item->penulis}}</td>
                                    <td class="text-center" style="padding: 20px;">
                                        {{ optional($item->id_penerbit instanceof \App\Models\User ? $item->id_penerbit : \App\Models\User::find($item->id_penerbit))->username ?? 'Data penerbit tidak ditemukan' }}
                                    </td>
                                    <td class="text-center">
                                        @if($item->status == 'Sedang Dipinjam')
                                        <form action="{{ route('pinjambuku.return', $item->id_buku)}}" onsubmit="return confirm('Apakah Anda Yakin ingin mengembalikan buku ini?');" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-primary" style="width: 150px; height:40px;">
                                                Kembalikan
                                            </button>
                                        </form>
                                        @elseif($item->status == 'Tersedia')
                                        <button class="btn btn-sm btn-secondary" class="btn btn-secondary" style="width: 150px;height:40px;" disabled>
                                            Sudah Dikembalikan
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Pinjam Buku belum tersedia
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $dataBuku->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection