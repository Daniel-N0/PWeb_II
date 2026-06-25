<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $members = Member::query()

            ->when($search, function ($query) use ($search) {

                $query->where('nama_member', 'like', "%{$search}%")
                    ->orWhere('nomor_member', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%");

            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalMember = Member::count();

        $memberAktif = Member::whereDate(
            'tgl_terakhir_bayar',
            '>=',
            now()->subMonth()
        )->count();

        $memberBaru = Member::whereMonth(
            'tgl_mendaftar',
            now()->month
        )->count();

        return view('member.index', compact(
            'members',
            'search',
            'totalMember',
            'memberAktif',
            'memberBaru'
        ));
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_member' => 'required|string|max:250',
            'nomor_member' => 'required|string|max:15',
            'alamat' => 'required|string',
            'tgl_mendaftar' => 'required|date',
            'tgl_terakhir_bayar' => 'required|date',
        ], [
            'nama_member.required' => 'Nama member wajib diisi.',
            'nomor_member.required' => 'Nomor member wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'tgl_mendaftar.required' => 'Tanggal mendaftar wajib diisi.',
            'tgl_terakhir_bayar.required' => 'Tanggal terakhir bayar wajib diisi.',
        ]);

        Member::create($validated);
        return redirect()->route('member.index')->with('success', 'Data member berhasil ditambahkan!');
    }

    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'nama_member' => 'required|string|max:250',
            'nomor_member' => 'required|string|max:15',
            'alamat' => 'required|string',
            'tgl_mendaftar' => 'required|date',
            'tgl_terakhir_bayar' => 'required|date',
        ], [
            'nama_member.required' => 'Nama member wajib diisi.',
            'nomor_member.required' => 'Nomor member wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'tgl_mendaftar.required' => 'Tanggal mendaftar wajib diisi.',
            'tgl_terakhir_bayar.required' => 'Tanggal terakhir bayar wajib diisi.',
        ]);

        $member->update($validated);
        return redirect()->route('member.index')->with('success', 'Data member berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with('success', 'Data member berhasil dihapus!');
    }
}
