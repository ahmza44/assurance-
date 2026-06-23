<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié | AXA</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#0A1E5C',
                        accent: '#E4002B'
                    }
                }
            }
        }
    </script>
    <style>
        .custom-wave {
            clip-path: ellipse(80% 60% at 50% 40%);
        }
    </style>
</head>
<body class="min-h-screen bg-slate-100 font-sans antialiased flex flex-col justify-between">

    <div class="relative w-full bg-navy text-white pt-12 pb-32 overflow-hidden custom-wave">
        <div class="absolute top-0 left-0 w-32 h-full bg-accent -skew-x-12 origin-top-left transform scale-y-125"></div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 flex flex-col items-center text-center">
            <div class="w-24 h-24 bg-navy border-2 border-white/20 p-2 rounded shadow-md mb-6 flex items-center justify-center">
                <img src="{{ asset('storage/logo/logo.png') }}" class="max-w-full max-h-full object-contain" alt="Logo AXA">
            </div>
            
            <h1 class="text-3xl md:text-4xl font-bold tracking-tight">Mot de passe oublié</h1>
            <p class="text-slate-200 mt-2 text-sm md:text-base font-light">Réinitialisation sécurisée de votre accès</p>
        </div>
    </div>

    <main class="flex-grow flex items-start justify-center px-4 -mt-20 relative z-20 mb-12">
        <div class="w-full max-w-xl bg-white rounded-2xl shadow-xl p-6 md:p-8 border border-slate-100">
            
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-lg bg-navy flex items-center justify-center text-white shadow-md">
                    <i data-lucide="key-round" class="w-5 h-5"></i>
                </div>
                <div class="flex-grow flex items-center gap-4">
                    <h2 class="text-sm font-bold text-navy uppercase tracking-wider whitespace-nowrap">Récupération</h2>
                    <div class="h-[2px] bg-accent flex-grow mt-0.5"></div>
                </div>
            </div>

            <div class="mb-6 text-sm text-slate-500 leading-relaxed bg-slate-50 p-4 rounded-xl border border-slate-100">
                {{ __('Mot de passe oublié ? Aucun problème. Indiquez-nous votre adresse email et nous vous enverrons un lien de réinitialisation pour en choisir un nouveau.') }}
            </div>

            @if (session('status'))
                <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm rounded-xl flex items-center gap-3 shadow-sm">
                    <i data-lucide="check-circle" class="w-5 h-5 flex-shrink-0 text-emerald-600"></i>
                    <div>{{ session('status') }}</div>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Adresse Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               placeholder="exemple@domaine.com"
                               class="w-full pl-10 pr-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm transition-all focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy placeholder-slate-400 @error('email') border-red-500 ring-2 ring-red-100 @enderror">
                    </div>
                    @error('email')
                        <p class="text-xs text-red-600 mt-1.5 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="space-y-3 pt-2">
                    <button class="w-full bg-navy text-white py-3 rounded-lg text-base font-semibold shadow-md hover:bg-[#06133a] active:scale-[0.99] transition-all flex items-center justify-center gap-2">
                        <span>Envoyer le lien de réinitialisation</span>
                        <i data-lucide="send" class="w-4 h-4"></i>
                    </button>

                    <a href="{{ route('login') }}" class="w-full bg-slate-100 text-slate-700 py-2.5 rounded-lg text-sm font-medium hover:bg-slate-200 transition-all flex items-center justify-center gap-2">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        <span>Retour à la page de connexion</span>
                    </a>
                </div>

            </form>
        </div>
    </main>

    <footer class="w-full text-center py-4 text-xs text-slate-400 tracking-wide border-t border-slate-200 bg-white">
        © {{ date('Y') }} — Connexion Chiffrée & Sécurisée
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>