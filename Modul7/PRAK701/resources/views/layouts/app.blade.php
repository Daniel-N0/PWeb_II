<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Perpustakaan')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family:'Poppins',sans-serif;
        }
    </style>

</head>

<body class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-cyan-100 relative overflow-x-hidden">

<!-- Background Blur -->
<div class="fixed -top-40 -left-40 w-96 h-96 bg-blue-300 opacity-20 blur-3xl rounded-full"></div>

<div class="fixed bottom-0 -right-40 w-96 h-96 bg-cyan-300 opacity-20 blur-3xl rounded-full"></div>

@include('layouts.navbar')

<main class="relative z-10 max-w-7xl mx-auto px-6 py-10">

    @if(session('success'))

        <div class="mb-6">

            <x-alert>

                {{ session('success') }}

            </x-alert>

        </div>

    @endif

    @if(session('error'))

        <div class="mb-6">

            <x-alert variant="danger">

                {{ session('error') }}

            </x-alert>

        </div>

    @endif

    @yield('content')

</main>

</body>
</html>
