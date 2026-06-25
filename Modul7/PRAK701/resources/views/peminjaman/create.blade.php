@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')

    <div class="max-w-3xl mx-auto">

        <x-page-header
            title="Tambah Peminjaman"
            description="Tambahkan data peminjaman buku baru." />

        <div class="mt-8">

            <x-card>

                <form
                    action="{{ route('peminjaman.store') }}"
                    method="POST"
                    novalidate
                    class="space-y-8">

                    @csrf

                    @include('peminjaman.partials.form')

                    <x-form-actions
                        :cancel-url="route('peminjaman.index')"
                        submit-text="Simpan Peminjaman" />

                </form>

            </x-card>

        </div>

    </div>

@endsection
