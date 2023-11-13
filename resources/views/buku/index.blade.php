@extends('dashboard')
@section('content')


<style>
    body {
        background: url('https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9640.jpg?w=900&t=st=1698697077~exp=1698697677~hmac=1a12d710da0136a68f348da615842a1d1f70266855cd129d10e3e012bf782d16');
        background-size: cover;
    }
    
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .pagination>li {
        margin: 0 5px;
        list-style: none;
    }

    .pagination a,
    .pagination span {
        color: #333;
        text-decoration: none;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .pagination a:hover {
        background-color: #eee;
    }

</style>

<div class="wrap d-flex" style="justify-content: center;">
    <div class="menu d-flex justify-content-center mt-3" style="background-color: rgba(119, 235, 184, 1); width: 15%; border-radius: 15px">
        <h1>Buku Saya</h1>
    </div>
</div>

<div class="content mt-4">
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-10">
            <div class="card" style="background-color: rgba(255, 255, 255, 0.8);">
                <div class="card-body">
                    <a href="{{ route ('buku.create') }}" class="btn btn-md mb-3" style="background-color: rgba(35, 169, 70, 1); color:white;">Tambah Buku</a>
                    <div class="table-responsive p-0">
                        <table class="table table-hover text-no-wrap">
                            <thead style="opacity: 0.8;">
                                <tr class="table-secondary">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul Buku</th>
                                    <th class="text-center">Penulis</th>
                                    <th class="text-center">Status Buku</th>
                                    <th class="text-center">action</th>
                                </tr>
                            </thead>
                            <tbody style="opacity:0.8">
                                @forelse($buku as $item)
                                <tr>
                                    <th class="text-center"style="padding: 20px">{{$loop->iteration}}.</th>
                                    <td class="text-center"style="padding: 20px">{{$item->judul}}</td>
                                    <td class="text-center"style="padding: 20px">{{$item->penulis}}</td>
                                    <td class="text-center"style="padding: 20px">{{$item->status}}</td>
                                    <td class="text-center"style="padding: 20px">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('buku.destroy', $item->id_buku) }}" method="POST">
                                            <a href="{{ route('buku.edit', $item->id_buku) }}">
                                                <i class="fas fa-pencil-alt text-primary"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background:none; border:none">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Buku belum tersedia
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $buku->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection