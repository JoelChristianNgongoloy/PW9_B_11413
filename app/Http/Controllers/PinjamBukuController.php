<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\PinjamBuku;
use App\Models\User;
use App\Models\Buku;

class PinjamBukuController extends Controller
{
    public function index()
    {
        $dataBuku = Buku::paginate(5);
        $pinjambuku = PinjamBuku::with('buku', 'user')->latest()->paginate(5);
        return view('pinjambuku.index', compact('pinjambuku', 'dataBuku'));
    }

    public function idxkembali()
    {
        $dataBuku = Buku::paginate(5);
        $pinjambuku = PinjamBuku::with('buku', 'user')->latest()->paginate(5);
        return view('pinjambuku.kembalikan', compact('pinjambuku', 'dataBuku'));
    }

    public function bukuPinjam($id_buku)
    {
        $buku = Buku::where('id_buku', $id_buku)->first();

        if ($buku && $buku->status == 'Tersedia') {
            $buku->status = 'Sedang Dipinjam';
            $buku->save();

            PinjamBuku::create([
                'id_buku' => $buku->id_buku,
                'id_peminjam' => auth()->id(),
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => now()->addDays(7),
            ]);

            return redirect()->route('pinjambuku.index')->with('success', 'Buku berhasil dipinjam');
        }
        return redirect()->route('pinjambuku.index')->with('error', 'Buku tidak berhasil dipinjam');
    }

    public function returnBuku($id_buku)
    {
        $buku = Buku::where('id_buku', $id_buku)->first();

        if ($buku && $buku->status == 'Sedang Dipinjam') {
            $buku->status = 'Tersedia';
            $buku->save();

            PinjamBuku::create([
                'id_buku' => $buku->id_buku,
                'id_peminjam' => auth()->id(),
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => now()->addDays(7),
            ]);

            return redirect()->route('pinjambuku.kembalikan')->with('success', 'Buku berhasil dipinjam');
        }
    }
}
