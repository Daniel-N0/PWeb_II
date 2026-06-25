@extends('layouts.app')

@section('title', 'PRAK701')

@section('content')

    <div class="flex flex-col items-center justify-center min-h-[75vh] text-center">

        <div class="max-w-3xl">

        <span class="inline-block px-4 py-2 rounded-full bg-sky-100 text-sky-700 font-medium mb-6">
            📚 Sistem Manajemen Perpustakaan
        </span>

            <h1 class="text-5xl md:text-6xl font-bold text-slate-800 leading-tight">

                Selamat Datang di

                <span class="text-sky-600">
                PRAK701
            </span>

            </h1>

            <p class="mt-6 text-lg text-slate-500 leading-relaxed">

                Kelola data buku, anggota, dan peminjaman dalam satu sistem yang
                modern, cepat, dan mudah digunakan.

            </p>

            <div class="mt-10 flex flex-wrap justify-center gap-4">

                <a href="{{ route('buku.index') }}">

                    <x-button>
                        📚 Jelajahi Buku
                    </x-button>

                </a>

                @guest

                    <a href="{{ route('login') }}">

                        <x-button variant="secondary">
                            🔑 Login Admin
                        </x-button>

                    </a>

                @else

                    <a href="{{ route('member.index') }}">

                        <x-button variant="secondary">
                            👥 Kelola Member
                        </x-button>

                    </a>

                @endguest

            </div>

        </div>

    </div>

@endsection
