<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Member;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $peminjamans = Peminjaman::select(
            'peminjamans.*',
            'members.nama_member',
            'bukus.judul'
        )
            ->join('members', 'peminjamans.id_member', '=', 'members.id')
            ->join('bukus', 'peminjamans.id_buku', '=', 'bukus.id')

            ->when($search, function ($query) use ($search) {

                $query->where('members.nama_member', 'like', "%{$search}%")
                    ->orWhere('bukus.judul', 'like', "%{$search}%");

            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalPeminjaman = Peminjaman::count();

        $totalMemberMeminjam = Peminjaman::distinct('id_member')
            ->count('id_member');

        $totalBukuDipinjam = Peminjaman::distinct('id_buku')
            ->count('id_buku');

        return view('peminjaman.index', compact(
            'peminjamans',
            'search',
            'totalPeminjaman',
            'totalMemberMeminjam',
            'totalBukuDipinjam'
        ));
    }

    public function create()
    {
        $members = Member::all();
        $bukus = Buku::all();
        return view('peminjaman.create', compact('members', 'bukus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_member' => 'required|exists:members,id',
            'id_buku' => 'required|exists:bukus,id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ], [
            'id_member.required' => 'Silakan pilih member.',
            'id_buku.required' => 'Silakan pilih buku.',
            'tgl_pinjam.required' => 'Tanggal pinjam wajib diisi.',
            'tgl_kembali.required' => 'Tanggal kembali wajib diisi.',
            'tgl_kembali.after_or_equal' => 'Tanggal kembali tidak boleh sebelum tanggal pinjam.',
        ]);

        Peminjaman::create($validated);
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan!');
    }

    public function edit(Peminjaman $peminjaman)
    {
        $members = Member::all();
        $bukus = Buku::all();

        return view(
            'peminjaman.edit',
            compact('peminjaman', 'members', 'bukus')
        );
    }

    public function update(
        Request $request,
        Peminjaman $peminjaman
    )
    {
        $validated = $request->validate([
            'id_member' => 'required|exists:members,id',
            'id_buku' => 'required|exists:bukus,id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ], [
            'id_member.required' => 'Silakan pilih member.',
            'id_buku.required' => 'Silakan pilih buku.',
            'tgl_pinjam.required' => 'Tanggal pinjam wajib diisi.',
            'tgl_kembali.required' => 'Tanggal kembali wajib diisi.',
            'tgl_kembali.after_or_equal' => 'Tanggal kembali tidak boleh sebelum tanggal pinjam.',
        ]);

        $peminjaman->update($validated);

        return redirect()
            ->route('peminjaman.index')
            ->with(
                'success',
                'Data peminjaman berhasil diperbarui!'
            );
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect()
            ->route('peminjaman.index')
            ->with(
                'success',
                'Data peminjaman berhasil dihapus!'
            );
    }
}
