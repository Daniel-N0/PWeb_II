<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Beranda</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Manrope:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
                "display": ["Playfair Display", "serif"], 
                "body": ["Manrope", "sans-serif"]
            },
            colors: {
                "card-bg": "#6c7481",
                "box-bg": "#545c6a",
                "accent-blue": "#93cbf1",
                "btn-blue": "#7dd3fc",
                "nav-bg": "#363a45"
            },
            animation: {
                "fade-in-up": "fadeInUp 0.8s ease-out forwards",
                "float": "float 6s ease-in-out infinite"
            },
            keyframes: {
                fadeInUp: {
                    "0%": { opacity: "0", transform: "translateY(20px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" }
                },
                float: {
                    "0%, 100%": { transform: "translateY(0)" },
                    "50%": { transform: "translateY(-10px)" }
                }
            }
          }
        }
      }
    </script>
</head>

<body class="min-h-screen flex flex-col font-body bg-gray-50 overflow-x-hidden">

    <header class="fixed top-0 w-full z-50 bg-nav-bg shadow-md">
        <div class="flex justify-between items-center px-6 py-4 max-w-7xl mx-auto">
            <div class="font-display text-2xl font-bold text-accent-blue">Modul 6</div>
            
            <nav class="hidden md:flex gap-8">
                <a class="text-accent-blue font-bold border-b-2 border-accent-blue pb-1 font-display text-xl transition-colors" href="{{ url('/beranda') }}">Beranda</a>
                <a class="text-gray-300 font-display text-xl hover:text-accent-blue transition-colors" href="{{ url('/profil') }}">Profil</a>
            </nav>
            
            <div class="flex items-center gap-4 text-gray-300">
            </div>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center pt-[100px] pb-12 px-4 md:px-6">
        
        <div class="bg-card-bg rounded-[2rem] p-8 md:p-14 w-full max-w-3xl text-center shadow-2xl opacity-0 animate-fade-in-up">
            
            <div class="w-20 h-20 mx-auto bg-box-bg rounded-full flex items-center justify-center mb-6 shadow-lg animate-float">
                <span class="material-symbols-outlined text-accent-blue text-4xl">waving_hand</span>
            </div>

            <h1 class="font-display text-4xl md:text-5xl text-accent-blue mb-4">Selamat Datang!</h1>
            <p class="text-gray-200 text-lg md:text-xl mb-10 leading-relaxed max-w-2xl mx-auto">
                Ini adalah halaman beranda Praktikum Pemrograman Web II Modul 6. Halaman ini dibangun menggunakan framework Laravel dengan mengimplementasikan konsep arsitektur MVC (Model, View, Controller).
            </p>
            
            <div class="w-16 h-[2px] bg-gray-400 mx-auto mb-10 opacity-50"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10 text-left">
                
                <div class="bg-box-bg rounded-2xl p-5 shadow-inner transition-transform duration-300 hover:scale-[1.02]">
                    <p class="text-xs text-[#c8a0f0] uppercase tracking-widest mb-1 font-semibold">Nama Praktikan</p>
                    <p class="font-body text-white text-xl font-bold">{{ $profile->full_name }}</p>
                </div>

                <div class="bg-box-bg rounded-2xl p-5 shadow-inner transition-transform duration-300 hover:scale-[1.02]">
                    <p class="text-xs text-[#c8a0f0] uppercase tracking-widest mb-1 font-semibold">Nomor Induk Mahasiswa</p>
                    <p class="font-body text-white text-xl font-bold">{{ $profile->student_id }}</p>
                </div>

            </div>
            
            <div class="mt-4">
                <a href="{{ url('/profil') }}" class="inline-block bg-btn-blue text-gray-900 font-bold px-8 py-3.5 rounded-xl hover:bg-white transition-colors duration-300 w-full sm:w-auto text-lg shadow-[0_0_15px_rgba(125,211,252,0.4)]">
                    Lihat Halaman Profil
                </a>
            </div>
            
        </div>
        
    </main>
</body>
</html>