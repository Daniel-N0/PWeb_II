@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')

    <div class="space-y-10">

        <x-page-header
            title="Data Peminjaman"
            description="Kelola seluruh data peminjaman buku perpustakaan.">

            <x-slot:actions>
                @auth
                    <a href="{{ route('peminjaman.create') }}">
                        <x-button>
                            + Tambah Peminjaman
                        </x-button>
                    </a>
                @endauth
            </x-slot:actions>

        </x-page-header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <x-stat-card
                title="Total Peminjaman"
                :value="$totalPeminjaman" />

            <x-stat-card
                title="Member Meminjam"
                :value="$totalMemberMeminjam" />

            <x-stat-card
                title="Buku Dipinjam"
                :value="$totalBukuDipinjam" />

        </div>

        <x-search-bar
            :action="route('peminjaman.index')"
            placeholder="Cari nama member atau judul buku..." />

        <x-table>

            <table class="min-w-full">

                <thead class="bg-slate-100 border-b">

                <tr class="text-sm uppercase tracking-wider text-slate-600">

                    <th class="px-6 py-4 text-left">
                        No
                    </th>

                    <th class="px-6 py-4 text-left">
                        Nama Member
                    </th>

                    <th class="px-6 py-4 text-left">
                        Judul Buku
                    </th>

                    <th class="px-6 py-4 text-center">
                        Tanggal Pinjam
                    </th>

                    <th class="px-6 py-4 text-center">
                        Tanggal Kembali
                    </th>

                    @auth
                        <th class="px-6 py-4 text-center">
                            Aksi
                        </th>
                    @endauth

                </tr>

                </thead>

                <tbody>

                @forelse($peminjamans as $index => $pinjam)

                    <tr class="border-b hover:bg-sky-50 transition-all duration-200">

                        <td class="px-6 py-4">

                            {{ method_exists($peminjamans, 'firstItem')
                                ? $peminjamans->firstItem() + $index
                                : $index + 1 }}

                        </td>

                        <td class="px-6 py-4 font-semibold text-slate-800">

                            {{ $pinjam->nama_member }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $pinjam->judul }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            {{ \Carbon\Carbon::parse($pinjam->tgl_pinjam)->format('d-m-Y') }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            {{ \Carbon\Carbon::parse($pinjam->tgl_kembali)->format('d-m-Y') }}

                        </td>

                        @auth

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('peminjaman.edit', $pinjam) }}">

                                        <x-button
                                            variant="warning"
                                            class="px-4 py-2">

                                            Edit

                                        </x-button>

                                    </a>

                                    <form
                                        action="{{ route('peminjaman.destroy', $pinjam) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data peminjaman ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <x-button
                                            type="submit"
                                            variant="danger"
                                            class="px-4 py-2">

                                            Hapus

                                        </x-button>

                                    </form>

                                </div>

                            </td>

                        @endauth

                    </tr>

                @empty

                    <tr>

                        <td colspan="{{ auth()->check() ? 6 : 5 }}">

                            <x-empty-state
                                title="Belum ada data peminjaman"
                                description="Tambahkan data peminjaman pertama untuk mulai menggunakan sistem." />

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </x-table>

        @if(method_exists($peminjamans, 'links'))

            <div class="flex justify-center">

                {{ $peminjamans->links() }}

            </div>

        @endif

    </div>

@endsection
