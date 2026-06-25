@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')

    <div class="max-w-3xl mx-auto">

        <x-page-header
            title="Tambah Buku"
            description="Tambahkan data buku baru ke dalam sistem perpustakaan." />

        <div class="mt-8">

            <x-card>

                <form
                    action="{{ route('buku.store') }}"
                    method="POST"
                    novalidate
                    class="space-y-8">

                    @csrf

                    @include('buku.partials.form')

                    <x-form-actions
                        :cancel-url="route('buku.index')"
                        submit-text="Simpan Buku" />

                </form>

            </x-card>

        </div>

    </div>

@endsection
