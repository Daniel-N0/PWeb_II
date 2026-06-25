<nav class="sticky top-0 z-50 bg-white/70 backdrop-blur-xl border-b border-white/30 shadow-sm">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex h-20 justify-between items-center">

            <div class="flex items-center gap-10">

                <a href="{{ url('/') }}"
                   class="text-2xl font-bold text-sky-600 flex items-center gap-2">

                     PRAK701

                </a>

                <div class="hidden md:flex gap-2">

                    <a href="{{ route('buku.index') }}"
                        class="px-4 py-2 rounded-xl transition
                       {{ request()->routeIs('buku.*')
                            ? 'bg-sky-100 text-sky-700 font-semibold shadow-sm'
                            : 'hover:bg-sky-100 text-slate-700'
                       }}">
                    
                        Buku
                    
                   <a href="{{ route('member.index') }}"
                       class="px-4 py-2 rounded-xl transition
                       {{ request()->routeIs('member.*')
                            ? 'bg-sky-100 text-sky-700 font-semibold shadow-sm'
                            : 'hover:bg-sky-100 text-slate-700'
                       }}">
                    
                        Member
                    
                    </a>

                    <a href="{{ route('peminjaman.index') }}"
                       class="px-4 py-2 rounded-xl transition
                       {{ request()->routeIs('peminjaman.*')
                            ? 'bg-sky-100 text-sky-700 font-semibold shadow-sm'
                            : 'hover:bg-sky-100 text-slate-700'
                       }}">

                        Peminjaman

                    </a>

                </div>

            </div>

            <div>

                @auth

                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <x-button
                            type="submit"
                            variant="danger">

                            Logout

                        </x-button>

                    </form>

                @else

                    @if (!request()->routeIs('login'))

                        <a href="{{ route('login') }}">
                            <x-button>
                                Login
                            </x-button>
                        </a>

                    @endif

                @endauth

            </div>

        </div>

    </div>

</nav>
