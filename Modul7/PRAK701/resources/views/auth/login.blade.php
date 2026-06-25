@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="flex items-center justify-center min-h-[80vh]">

        <div class="w-full max-w-md">

            <x-card class="p-10">

                <div class="text-center mb-8">

                    <div class="text-6xl mb-4">
                    </div>

                    <h1 class="text-3xl font-bold text-slate-800">
                        PRAK701
                    </h1>

                    <p class="text-slate-500 mt-3">
                        Login untuk mengelola sistem perpustakaan.
                    </p>

                </div>

                @if(request()->has('redirected'))

                    <x-alert type="danger">
                        Login terlebih dahulu!
                    </x-alert>

                @endif

                <form
                    action="{{ route('login') }}"
                    method="POST"
                    class="space-y-6 mt-6">

                    @csrf

                    <x-input
                        label="Email"
                        name="email"
                        type="email"
                        placeholder="user@gmail.com" />

                    <x-input
                        label="Password"
                        name="password"
                        type="password"
                        placeholder="••••••••" />

                    <div class="pt-2 pb-2">

                        <x-button
                            type="submit"
                            class="w-full">

                            Masuk

                        </x-button>

                    </div>

                </form>

            </x-card>

        </div>

    </div>

@endsection
