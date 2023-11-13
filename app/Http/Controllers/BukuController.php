<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::latest()->paginate(5);

        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
        ]);

        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'id_penerbit' => $user->id_user,
            'status' => 'Tersedia',
        ]);

        return redirect()->route('buku');
    }

    public function edit($id_buku)
    {
        $buku = Buku::where('id_buku', $id_buku)->first(); // or Buku::find($id_buku);

    if (!$buku) {
        // Handle case when the record is not found, redirect, show an error, etc.
        return redirect()->route('buku')->with(['error' => 'Data not found.']);
    }

    return view('buku.edit', compact('buku'));
    }

    public function update($id_buku, Request $request)
    {
        $dataToUpdate = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
        ];

        DB::table('bukus')->where('id_buku', '=', $id_buku)->update($dataToUpdate);
        return redirect()->route('buku');
    }

    public function destroy($id_buku)
    {
        DB::table('bukus')->where('id_buku', '=', $id_buku)->delete();
        return redirect()->route('buku')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
