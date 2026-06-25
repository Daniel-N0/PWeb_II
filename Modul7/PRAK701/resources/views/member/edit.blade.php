@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')

    <div class="max-w-3xl mx-auto">

        <x-page-header
            title="Edit Member"
            description="Perbarui informasi member yang sudah terdaftar." />

        <div class="mt-8">

            <x-card>

                <form
                    action="{{ route('member.update', $member) }}"
                    method="POST"
                    novalidate
                    class="space-y-8">

                    @csrf
                    @method('PUT')

                    @include('member.partials.form')

                    <x-form-actions
                        :cancel-url="route('member.index')"
                        submit-text="Perbarui Member" />

                </form>

            </x-card>

        </div>

    </div>

@endsection
