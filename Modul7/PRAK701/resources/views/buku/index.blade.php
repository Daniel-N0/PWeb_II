@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

    <div class="space-y-10">

        <x-page-header
            title="Daftar Buku"
            description="Kelola seluruh koleksi buku yang tersedia di perpustakaan.">

            <x-slot:actions>
                @auth
                    <a href="{{ route('buku.create') }}">
                        <x-button>
                            + Tambah Buku
                        </x-button>
                    </a>
                @endauth
            </x-slot:actions>

        </x-page-header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <x-stat-card
                title="Total Buku"
                :value="$totalBuku" />

            <x-stat-card
                title="Total Penulis"
                :value="$totalPenulis" />

            <x-stat-card
                title="Total Penerbit"
                :value="$totalPenerbit" />

        </div>

        <x-search-bar
            :action="route('buku.index')"
            placeholder="Cari judul, penulis, atau penerbit..." />

        <x-table>

            <table class="min-w-full">

                <thead class="bg-slate-100 border-b">

                <tr class="text-sm uppercase tracking-wider text-slate-600">

                    <th class="px-6 py-4 text-left">
                        No
                    </th>

                    <th class="px-6 py-4 text-left">
                        Judul Buku
                    </th>

                    <th class="px-6 py-4 text-left">
                        Penulis
                    </th>

                    <th class="px-6 py-4 text-left">
                        Penerbit
                    </th>

                    <th class="px-6 py-4 text-center">
                        Tahun
                    </th>

                    @auth
                        <th class="px-6 py-4 text-center">
                            Aksi
                        </th>
                    @endauth

                </tr>

                </thead>

                <tbody>

                @forelse($bukus as $index => $buku)

                    <tr class="border-b hover:bg-sky-50 transition-all duration-200">

                        <td class="px-6 py-4">

                            {{ method_exists($bukus, 'firstItem')
                                ? $bukus->firstItem() + $index
                                : $index + 1 }}

                        </td>

                        <td class="px-6 py-4">

                            <div class="font-semibold text-slate-800">

                                {{ $buku->judul }}

                            </div>

                        </td>

                        <td class="px-6 py-4">

                            {{ $buku->penulis }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $buku->penerbit }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            <span
                                class="inline-flex items-center rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-700">

                                {{ $buku->tahun_terbit }}

                            </span>

                        </td>

                        @auth

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('buku.edit', $buku) }}">
                                        <x-button
                                            variant="warning"
                                            class="px-4 py-2">

                                            Edit

                                        </x-button>
                                    </a>

                                    <form
                                        action="{{ route('buku.destroy', $buku) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

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
                                title="Belum ada data buku"
                                description="Tambahkan buku pertama untuk memulai koleksi perpustakaan." />

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </x-table>

        @if(method_exists($bukus, 'links'))

            <div class="flex justify-center">

                {{ $bukus->links() }}

            </div>

        @endif

    </div>

@endsection
