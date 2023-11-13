@extends('dashboard')
@section('content')

<style>
    body {
        background: url('https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9640.jpg?w=900&t=st=1698697077~exp=1698697677~hmac=1a12d710da0136a68f348da615842a1d1f70266855cd129d10e3e012bf782d16');
        background-size: cover;
    }
</style>

<div class="wrap d-flex" style="justify-content: center;">
    <div class="menu d-flex justify-content-center mt-3" style="background-color: rgba(119, 235, 184, 1); width: 15%; border-radius: 15px">
        <h1>Pinjam Buku</h1>
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
                                    <th class="text-center">penerbit</th>
                                    <th class="text-center">action</th>
                                </tr>
                            </thead>
                            <tbody style="opacity:0.8">
                                @forelse($dataBuku as $item)
                                <tr>
                                    <th class="text-center"><strong>{{$loop->iteration}}.</strong></th>
                                    <td class="text-center">{{$item->judul}}</td>
                                    <td class="text-center">{{$item->penulis}}</td>
                                    <td class="text-center">
                                        {{ optional($item->id_penerbit instanceof \App\Models\User ? $item->id_penerbit : \App\Models\User::find($item->id_penerbit))->username ?? 'Data penerbit tidak ditemukan' }}
                                    </td>
                                    <td class="text-center">
                                        @if($item->status == 'Tersedia')
                                        <form action="{{ route('pinjambuku.buku', $item->id_buku)}}" onsubmit="return confirm('Apakah Anda Yakin ingin meminjam buku ini?');" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" style="background: none; border: none;">
                                                <i class="fas fa-plus text-primary"></i>
                                            </button>
                                        </form>
                                        @else
                                        <button class="btn btn-sm btn-secondary" style="background: none; border: none;" disabled>
                                            <i class="fas fa-plus text-secondary"></i>
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