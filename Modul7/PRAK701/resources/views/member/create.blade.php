@extends('layouts.app')

@section('title', 'Tambah Member')

@section('content')

    <div class="max-w-3xl mx-auto">

        <x-page-header
            title="Tambah Member"
            description="Tambahkan data member baru ke dalam sistem perpustakaan." />

        <div class="mt-8">

            <x-card>

                <form
                    action="{{ route('member.store') }}"
                    method="POST"
                    novalidate
                    class="space-y-8">

                    @csrf

                    @include('member.partials.form')

                    <x-form-actions
                        :cancel-url="route('member.index')"
                        submit-text="Simpan Member" />

                </form>

            </x-card>

        </div>

    </div>

@endsection
