<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Detail Momen</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Manrope:wght@400;600&display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                "tertiary": "#c8a0f0", "on-surface": "#e0e8f0", 
                "primary": "#7dd3fc", "background": "#0a0e1a", 
                "on-background": "#e0e8f0", "inverse-surface": "#e0e8f0", 
                "on-primary": "#001f2e", "surface": "#0f1524",
                "on-surface-variant": "#a0b4c4"
            },
            "fontFamily": {
                "display-lg": ["Playfair Display"], "label-md": ["Manrope"], 
                "body-md": ["Manrope"], "body-lg": ["Manrope"]
            },
            "animation": {
                "gradient-x": "gradient-x 15s ease infinite",
                "fade-in-up": "fade-in-up 0.8s ease-out forwards",
                "drift": "drift 20s linear infinite"
            },
            "keyframes": {
                "gradient-x": {
                    "0%, 100%": { "background-size": "200% 200%", "background-position": "left center" },
                    "50%": { "background-size": "200% 200%", "background-position": "right center" }
                },
                "fade-in-up": { "0%": { "opacity": "0", "transform": "translateY(20px)" }, "100%": { "opacity": "1", "transform": "translateY(0)" } },
                "drift": { "0%": { "transform": "translate(0, 0) rotate(0deg)" }, "100%": { "transform": "translate(100px, -100px) rotate(360deg)" } }
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
        .magnetic-btn { transition: transform 0.2s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.2s; }
        .magnetic-btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 10px 20px -10px rgba(125, 211, 252, 0.5);
        }
    </style>
</head>

<body class="min-h-screen flex flex-col font-body-md text-body-md bg-mesh animate-gradient-x relative overflow-x-hidden">
    
    <div class="fixed inset-0 pointer-events-none z-[-1] overflow-hidden">
        <div class="absolute top-[20%] left-[10%] w-2 h-2 rounded-full bg-primary/20 blur-[1px] animate-drift" style="animation-duration: 25s;"></div>
        <div class="absolute top-[60%] left-[80%] w-3 h-3 rounded-full bg-tertiary/20 blur-[2px] animate-drift" style="animation-duration: 30s; animation-delay: -5s;"></div>
    </div>

    <header class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-md border-b border-white/5">
        <div class="flex justify-between items-center px-6 py-4 max-w-7xl mx-auto">
            <div class="font-display-lg text-2xl font-bold text-primary">Modul 6</div>
            
            <nav class="hidden md:flex gap-8 absolute left-1/2 transform -translate-x-1/2">
                <a class="text-on-surface-variant font-display-lg text-xl hover:text-primary transition-colors" href="{{ url('/beranda') }}">Beranda</a>
                <a class="text-on-surface-variant font-display-lg text-xl hover:text-primary transition-colors" href="{{ url('/profil') }}">Profil</a>
            </nav>

            <div class="w-8"></div>
        </div>
    </header>

    <main class="flex-grow pt-[120px] pb-24 px-4 md:px-6 max-w-6xl mx-auto w-full flex items-center justify-center">
        
        <div class="glass-card rounded-3xl p-6 md:p-10 w-full opacity-0 animate-fade-in-up flex flex-col lg:flex-row gap-10 items-center lg:items-stretch">
            
            <div class="w-full lg:w-1/2 relative rounded-2xl overflow-hidden border-4 border-surface shadow-[0_0_30px_rgba(0,0,0,0.5)]">
                <div class="absolute top-4 right-4 bg-primary text-on-primary font-bold px-4 py-1.5 rounded-full shadow-lg z-10 text-sm">
                    {{ $detail->period }}
                </div>
                <img src="{{ asset('images/' . $detail->image) }}" class="w-full h-full object-cover min-h-[300px] lg:min-h-[500px]" alt="Gambar Dokumentasi">
            </div>

            <div class="w-full lg:w-1/2 flex flex-col justify-center">
                
                <h1 class="font-display-lg text-3xl md:text-5xl text-primary mb-8 leading-tight">{{ $detail->title }}</h1>
                
                <div class="space-y-6">
                    <div class="glass-box rounded-2xl p-6">
                        <p class="font-label-md text-tertiary text-xs uppercase tracking-wider mb-2">Deskripsi Kegiatan</p>
                        <p class="font-body-lg text-on-surface leading-relaxed text-justify">
                            {{ $detail->description }}
                        </p>
                    </div>

                    <div class="glass-box rounded-2xl p-6 border-l-4 border-l-primary">
                        <p class="font-label-md text-tertiary text-xs uppercase tracking-wider mb-2">Kesan yang Dirasakan</p>
                        <p class="font-body-md text-on-surface-variant italic leading-relaxed text-justify">
                            "{{ $detail->impression }}"
                        </p>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ url('/profil') }}" class="inline-block magnetic-btn bg-primary text-on-primary font-label-md px-8 py-3.5 rounded-xl hover:bg-inverse-surface transition-colors duration-300 w-full lg:w-auto text-center font-bold shadow-[0_0_15px_rgba(125,211,252,0.3)]">
                       Kembali ke Profil
                    </a>
                </div>

            </div>
        </div>

    </main>
</body>
</html>