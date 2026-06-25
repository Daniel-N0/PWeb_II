@extends('layouts.app')

@section('title', 'Daftar Member')

@section('content')

    <div class="space-y-10">

        <x-page-header
            title="Daftar Member"
            description="Kelola seluruh data member perpustakaan.">

            <x-slot:actions>
                @auth
                    <a href="{{ route('member.create') }}">
                        <x-button>
                            + Tambah Member
                        </x-button>
                    </a>
                @endauth
            </x-slot:actions>

        </x-page-header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <x-stat-card
                title="Total Member"
                :value="$totalMember" />

            <x-stat-card
                title="Member Aktif"
                :value="$memberAktif" />

            <x-stat-card
                title="Member Baru"
                :value="$memberBaru" />

        </div>

        <x-search-bar
            :action="route('member.index')"
            placeholder="Cari nama member, nomor member, atau alamat..." />

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
                        Nomor Member
                    </th>

                    <th class="px-6 py-4 text-left">
                        Alamat
                    </th>

                    <th class="px-6 py-4 text-center">
                        Tgl Daftar
                    </th>

                    <th class="px-6 py-4 text-center">
                        Tgl Bayar Terakhir
                    </th>

                    @auth
                        <th class="px-6 py-4 text-center">
                            Aksi
                        </th>
                    @endauth

                </tr>

                </thead>

                <tbody>

                @forelse($members as $index => $member)

                    <tr class="border-b hover:bg-sky-50 transition-all duration-200">

                        <td class="px-6 py-4">

                            {{ method_exists($members, 'firstItem')
                                ? $members->firstItem() + $index
                                : $index + 1 }}

                        </td>

                        <td class="px-6 py-4 font-semibold text-slate-800">

                            {{ $member->nama_member }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $member->nomor_member }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $member->alamat }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            {{ \Carbon\Carbon::parse($member->tgl_mendaftar)->format('d-m-Y') }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            {{ \Carbon\Carbon::parse($member->tgl_terakhir_bayar)->format('d-m-Y') }}

                        </td>

                        @auth

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('member.edit', $member) }}">

                                        <x-button
                                            variant="warning"
                                            class="px-4 py-2">

                                            Edit

                                        </x-button>

                                    </a>

                                    <form
                                        action="{{ route('member.destroy', $member) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus member ini?')">

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

                        <td colspan="{{ auth()->check() ? 7 : 6 }}">

                            <x-empty-state
                                title="Belum ada data member"
                                description="Tambahkan member pertama untuk mulai menggunakan sistem perpustakaan." />

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </x-table>

        @if(method_exists($members, 'links'))

            <div class="flex justify-center">

                {{ $members->links() }}

            </div>

        @endif
    </div>

@endsection
