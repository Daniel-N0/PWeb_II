@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

    <div class="max-w-3xl mx-auto">

        <x-page-header
            title="Edit Buku"
            description="Perbarui informasi buku yang sudah tersimpan di sistem." />

        <div class="mt-8">

            <x-card>

                <form
                    action="{{ route('buku.update', $buku) }}"
                    method="POST"
                    novalidate
                    class="space-y-8">

                    @csrf
                    @method('PUT')

                    @include('buku.partials.form')

                    <x-form-actions
                        :cancel-url="route('buku.index')"
                        submit-text="Perbarui Buku"
                        submit-variant="warning" />

                </form>

            </x-card>

        </div>

    </div>

@endsection
