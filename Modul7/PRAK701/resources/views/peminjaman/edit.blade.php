@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')

    <div class="max-w-3xl mx-auto">

        <x-page-header
            title="Edit Peminjaman"
            description="Perbarui data peminjaman buku." />

        <div class="mt-8">

            <x-card>

                <form
                    action="{{ route('peminjaman.update', $peminjaman->id) }}"
                    method="POST"
                    novalidate
                    class="space-y-8">

                    @csrf
                    @method('PUT')

                    @include('peminjaman.partials.form')

                    <x-form-actions
                        :cancel-url="route('peminjaman.index')"
                        submit-text="Perbarui Peminjaman" />

                </form>

            </x-card>

        </div>

    </div>

@endsection
