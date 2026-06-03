<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Profil Praktikan</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Manrope:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                "tertiary": "#c8a0f0", "outline": "#4a6070",
                "on-surface": "#e0e8f0", "surface-variant": "#1a2438",
                "surface-dim": "#0f1524", "primary-container": "#0e4d6e",
                "outline-variant": "#2a3a48", "secondary": "#88b4cc", "primary": "#7dd3fc",
                "inverse-surface": "#e0e8f0", "background": "#0a0e1a", "on-background": "#e0e8f0",
                "inverse-primary": "#0a4c6e", "on-primary": "#001f2e", "surface": "#0f1524",
                "on-surface-variant": "#a0b4c4"
            },
            "fontFamily": {
                "display-lg-mobile": ["Playfair Display"], "label-md": ["Manrope"], 
                "display-lg": ["Playfair Display"], "body-md": ["Manrope"], "body-lg": ["Manrope"]
            },
            "animation": {
                "gradient-x": "gradient-x 15s ease infinite",
                "fade-in-up": "fade-in-up 0.8s ease-out forwards",
                "fade-in-left": "fade-in-left 0.8s ease-out forwards",
                "fade-in-right": "fade-in-right 0.8s ease-out forwards",
                "drift": "drift 20s linear infinite",
                "shimmer": "shimmer 2s infinite"
            },
            "keyframes": {
                "gradient-x": {
                    "0%, 100%": { "background-size": "200% 200%", "background-position": "left center" },
                    "50%": { "background-size": "200% 200%", "background-position": "right center" }
                },
                "fade-in-up": { "0%": { "opacity": "0", "transform": "translateY(20px)" }, "100%": { "opacity": "1", "transform": "translateY(0)" } },
                "fade-in-left": { "0%": { "opacity": "0", "transform": "translateX(-20px)" }, "100%": { "opacity": "1", "transform": "translateX(0)" } },
                "fade-in-right": { "0%": { "opacity": "0", "transform": "translateX(20px)" }, "100%": { "opacity": "1", "transform": "translateX(0)" } },
                "drift": { "0%": { "transform": "translate(0, 0) rotate(0deg)" }, "100%": { "transform": "translate(100px, -100px) rotate(360deg)" } },
                "shimmer": { "100%": { "transform": "translateX(100%)" } }
            }
          }
        }
      }
    </script>

    <style>
        body { background-color: theme('colors.background'); color: theme('colors.on-background'); }
        .bg-mesh {
            background: radial-gradient(circle at 15% 50%, rgba(14, 77, 110, 0.15), transparent 25%),
                        radial-gradient(circle at 85% 30%, rgba(125, 211, 252, 0.1), transparent 25%);
            background-size: 200% 200%;
        }
        .glass-card {
            background: rgba(15, 21, 36, 0.6); backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.02), 0 30px 60px rgba(0, 0, 0, 0.4);
        }
        .glass-box {
            background: rgba(26, 36, 56, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
        .glass-box:hover {
            background: rgba(26, 36, 56, 0.7);
            border: 1px solid rgba(125, 211, 252, 0.2);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .image-hover-wrapper { position: relative; overflow: hidden; }
        .image-hover-wrapper::after {
            content: ''; position: absolute; top: 0; left: -100%; width: 50%; height: 100%;
            background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: skewX(-20deg);
        }
        .image-hover-wrapper:hover::after { animation: shimmer 1s forwards; }
        .magnetic-btn { transition: transform 0.2s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.2s; }
        .magnetic-btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 10px 20px -10px rgba(125, 211, 252, 0.5);
        }
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }
        .delay-400 { animation-delay: 400ms; }
    </style>
</head>

<body class="min-h-screen flex flex-col font-body-md text-body-md bg-mesh animate-gradient-x relative overflow-x-hidden">
    
    <div class="fixed inset-0 pointer-events-none z-[-1] overflow-hidden">
        <div class="absolute top-[20%] left-[10%] w-2 h-2 rounded-full bg-primary/20 blur-[1px] animate-drift" style="animation-duration: 25s;"></div>
        <div class="absolute top-[60%] left-[80%] w-3 h-3 rounded-full bg-tertiary/20 blur-[2px] animate-drift" style="animation-duration: 30s; animation-delay: -5s;"></div>
        <div class="absolute top-[80%] left-[30%] w-4 h-4 rounded-full bg-primary/10 blur-[3px] animate-drift" style="animation-duration: 35s; animation-delay: -10s;"></div>
    </div>

    <header class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-md border-b border-white/5">
        <div class="flex justify-between items-center px-6 py-4 max-w-7xl mx-auto">
            <div class="font-display-lg text-2xl font-bold text-primary">Modul 6</div>
            <nav class="hidden md:flex gap-8">
                <a class="text-on-surface-variant font-display-lg text-xl hover:text-primary transition-colors" href="{{ url('/beranda') }}">Beranda</a>
                <a class="text-primary font-bold border-b-2 border-primary pb-1 font-display-lg text-xl transition-colors" href="{{ url('/profil') }}">Profil</a>
            </nav>
            <div class="flex items-center gap-4 text-on-surface-variant">
            </div>
        </div>
    </header>

    <main class="flex-grow pt-[100px] pb-24 px-4 md:px-6 max-w-7xl mx-auto w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center min-h-[716px]">
            
            <div class="lg:col-span-3 flex flex-col gap-10 hidden lg:flex opacity-0 animate-fade-in-left delay-100">
                @if(isset($experiences[0]))
                <a href="{{ url('/detail/' . $experiences[0]->id) }}" class="relative w-full aspect-[3/4] rounded-xl overflow-hidden shadow-[0_20px_40px_rgba(0,0,0,0.2)] transform -rotate-2 hover:rotate-0 hover:scale-105 hover:shadow-[0_30px_60px_rgba(0,0,0,0.3)] transition-all duration-500 ease-out image-hover-wrapper border border-white/5">
                    <img alt="Pengalaman 1" class="w-full h-full object-cover" src="{{ asset('images/' . $experiences[0]->image) }}"/>
                </a>
                @endif
                
                @if(isset($experiences[1]))
                <a href="{{ url('/detail/' . $experiences[1]->id) }}" class="relative w-full aspect-[3/4] rounded-xl overflow-hidden shadow-[0_20px_40px_rgba(0,0,0,0.2)] transform rotate-1 hover:rotate-0 hover:scale-105 hover:shadow-[0_30px_60px_rgba(0,0,0,0.3)] transition-all duration-500 ease-out ml-6 mt-4 image-hover-wrapper border border-white/5">
                    <img alt="Pengalaman 2" class="w-full h-full object-cover" src="{{ asset('images/' . $experiences[1]->image) }}"/>
                </a>
                @endif
            </div>

            <div class="lg:col-span-6 flex justify-center z-10 relative opacity-0 animate-fade-in-up delay-200">
                <div class="glass-card rounded-3xl p-8 md:p-10 w-full max-w-xl text-center flex flex-col items-center mt-6 lg:mt-0">
                    
                    <div class="w-32 h-32 md:w-36 md:h-36 rounded-full overflow-hidden border-4 border-surface shadow-[0_0_25px_rgba(125,211,252,0.3)] mb-6">
                        <img alt="Foto Profil" class="w-full h-full object-cover" src="{{ asset('images/' . $profile->image) }}"/>
                    </div>

                    <h1 class="font-display-lg text-4xl md:text-5xl text-primary mb-8">{{ $profile->full_name }}</h1>
                    
                    <div class="w-full space-y-4 text-left">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="glass-box rounded-2xl p-4">
                                <p class="font-label-md text-tertiary text-xs uppercase tracking-wider mb-1">NIM</p>
                                <p class="font-body-lg text-on-surface font-semibold">{{ $profile->student_id }}</p>
                            </div>

                            <div class="glass-box rounded-2xl p-4">
                                <p class="font-label-md text-tertiary text-xs uppercase tracking-wider mb-1">Asal Prodi</p>
                                <p class="font-body-lg text-on-surface font-semibold">{{ $profile->major }}</p>
                            </div>
                        </div>

                        <div class="glass-box rounded-2xl p-4">
                            <p class="font-label-md text-tertiary text-xs uppercase tracking-wider mb-1">Hobi</p>
                            <p class="font-body-md text-on-surface-variant">{{ $profile->hobbies }}</p>
                        </div>

                        <div class="glass-box rounded-2xl p-4">
                            <p class="font-label-md text-tertiary text-xs uppercase tracking-wider mb-1">Skill</p>
                            <p class="font-body-md text-on-surface-variant leading-relaxed">{{ $profile->skills }}</p>
                        </div>
                        
                    </div>
                    
                    <div class="mt-8 w-full">
                        <a href="{{ url('/') }}" class="inline-block magnetic-btn bg-primary text-on-primary font-label-md text-label-md px-8 py-3 rounded-xl hover:bg-inverse-surface transition-colors duration-300 w-full font-bold shadow-[0_0_15px_rgba(125,211,252,0.3)]">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3 flex flex-col gap-10 hidden lg:flex mt-16 opacity-0 animate-fade-in-right delay-300">
                @if(isset($experiences[2]))
                <a href="{{ url('/detail/' . $experiences[2]->id) }}" class="relative w-full aspect-[3/4] rounded-xl overflow-hidden shadow-[0_20px_40px_rgba(0,0,0,0.2)] transform rotate-2 hover:rotate-0 hover:scale-105 hover:shadow-[0_30px_60px_rgba(0,0,0,0.3)] transition-all duration-500 ease-out image-hover-wrapper border border-white/5">
                    <img alt="Pengalaman 3" class="w-full h-full object-cover" src="{{ asset('images/' . $experiences[2]->image) }}"/>
                </a>
                @endif
                
                @if(isset($experiences[3]))
                <a href="{{ url('/detail/' . $experiences[3]->id) }}" class="relative w-full aspect-[3/4] rounded-xl overflow-hidden shadow-[0_20px_40px_rgba(0,0,0,0.2)] transform -rotate-1 hover:rotate-0 hover:scale-105 hover:shadow-[0_30px_60px_rgba(0,0,0,0.3)] transition-all duration-500 ease-out mr-6 -mt-8 image-hover-wrapper border border-white/5">
                    <img alt="Pengalaman 4" class="w-full h-full object-cover" src="{{ asset('images/' . $experiences[3]->image) }}"/>
                </a>
                @endif
            </div>

        </div>

        <div class="grid grid-cols-2 gap-4 mt-12 lg:hidden opacity-0 animate-fade-in-up delay-400">
            @foreach($experiences as $exp)
            <a href="{{ url('/detail/' . $exp->id) }}" class="aspect-[3/4] rounded-xl overflow-hidden shadow-[0_10px_20px_rgba(0,0,0,0.2)] border border-white/5 image-hover-wrapper">
                <img alt="{{ $exp->title }}" class="w-full h-full object-cover" src="{{ asset('images/' . $exp->image) }}"/>
            </a>
            @endforeach
        </div>
    </main>
</body>
</html>