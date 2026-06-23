<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            DEFAULT: '#0A1E5C',
                            light: '#15308C',
                            dark: '#061440',
                        },
                        brandred: '#E4002B',
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        .input-icon-wrap input:focus,
        .input-icon-wrap select:focus {
            outline: none;
        }
    </style>
</head>
<body class="bg-slate-100 min-h-screen">

    <!-- HEADER -->
    <header class="relative bg-navy overflow-hidden">
        <!-- background building texture -->
        <div class="absolute inset-0 opacity-[0.08] bg-[linear-gradient(115deg,transparent_60%,white_60%)]"></div>
        <!-- diagonal red stripe -->
        <div class="absolute -top-10 -left-10 w-40 h-[220%] bg-brandred rotate-[20deg] opacity-90"></div>

        <div class="relative max-w-3xl mx-auto px-6 pt-14 pb-24 text-center">
            <div class="inline-flex items-center justify-center w-28 h-28 border-2 border-white/70 mb-6 p-3 bg-white/5">
                <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo" class="max-w-full max-h-full object-contain">
            </div>
            <h1 class="text-white text-3xl sm:text-4xl font-extrabold tracking-tight">
                Formulaire de souscription
            </h1>
            <p class="text-white/80 mt-2 text-base sm:text-lg">Inscription scolaire</p>
        </div>

        <!-- wave divider -->
        <svg class="absolute bottom-0 left-0 w-full text-slate-100" viewBox="0 0 1440 100" fill="currentColor" preserveAspectRatio="none" style="height: 60px;">
            <path d="M0,40 C360,110 1080,-20 1440,40 L1440,100 L0,100 Z"></path>
        </svg>
    </header>

    <!-- MAIN CARD -->
    <main class="relative -mt-2 px-4 sm:px-6 pb-16">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl shadow-navy/10 ring-1 ring-slate-200/60">
            <form action="{{ route('souscription.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-10">
                @csrf

                {{-- Flash / errors --}}
                @if (session('success'))
                    <div class="mb-6 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 rounded-lg bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-lg bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 text-sm">
                        <ul class="list-disc pl-5 space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- ===================== SECTION 1: INFOS PERSONNELLES ===================== --}}
                <div class="flex items-center gap-3 mb-6">
                    <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-navy flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h2 class="text-navy font-bold uppercase tracking-wide text-sm whitespace-nowrap">
                        Informations personnelles
                    </h2>
                    <div class="flex-1 h-px bg-brandred/70"></div>
                </div>

                <div class="grid sm:grid-cols-2 gap-5 mb-1">
                    {{-- Nom --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nom</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </span>
                            <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Entrez votre nom"
                                   class="w-full pl-10 pr-3 py-2.5 rounded-lg border border-slate-300 text-sm placeholder:text-slate-400 focus:border-navy focus:ring-2 focus:ring-navy/20 transition @error('nom') border-rose-400 @enderror">
                        </div>
                        @error('nom')<p class="text-xs text-rose-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Prénom --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Prénom</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </span>
                            <input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Entrez votre prénom"
                                   class="w-full pl-10 pr-3 py-2.5 rounded-lg border border-slate-300 text-sm placeholder:text-slate-400 focus:border-navy focus:ring-2 focus:ring-navy/20 transition @error('prenom') border-rose-400 @enderror">
                        </div>
                        @error('prenom')<p class="text-xs text-rose-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- CIN --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">CIN</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 014-4h0a4 4 0 014 4v2M3 7h18M3 7a2 2 0 012-2h14a2 2 0 012 2M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7"/></svg>
                            </span>
                            <input type="text" name="cin" value="{{ old('cin') }}" placeholder="Entrez votre CIN"
                                   class="w-full pl-10 pr-3 py-2.5 rounded-lg border border-slate-300 text-sm placeholder:text-slate-400 focus:border-navy focus:ring-2 focus:ring-navy/20 transition @error('cin') border-rose-400 @enderror">
                        </div>
                        @error('cin')<p class="text-xs text-rose-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Téléphone --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Téléphone</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </span>
                            <input type="text" name="telephone" value="{{ old('telephone') }}" placeholder="06 12 34 56 78"
                                   class="w-full pl-10 pr-3 py-2.5 rounded-lg border border-slate-300 text-sm placeholder:text-slate-400 focus:border-navy focus:ring-2 focus:ring-navy/20 transition @error('telephone') border-rose-400 @enderror">
                        </div>
                        @error('telephone')<p class="text-xs text-rose-600 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Email full width --}}
                <div class="mb-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="exemple@email.com"
                               class="w-full pl-10 pr-3 py-2.5 rounded-lg border border-slate-300 text-sm placeholder:text-slate-400 focus:border-navy focus:ring-2 focus:ring-navy/20 transition @error('email') border-rose-400 @enderror">
                    </div>
                    @error('email')<p class="text-xs text-rose-600 mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- ===================== SECTION 2: INFOS SCOLAIRES ===================== --}}
                <div class="flex items-center gap-3 mb-6 mt-10">
                    <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-navy flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                    </div>
                    <h2 class="text-navy font-bold uppercase tracking-wide text-sm whitespace-nowrap">
                        Informations scolaires
                    </h2>
                    <div class="flex-1 h-px bg-brandred/70"></div>
                </div>

                <div class="grid sm:grid-cols-2 gap-5 mb-5">

    {{-- UNIVERSITY --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">
            Université
        </label>

        <select id="university" name="university_id"
                class="w-full pl-3 pr-8 py-2.5 rounded-lg border border-slate-300 text-sm bg-white">
            <option value="">-- Sélectionner université --</option>

            @foreach($universities as $uni)
                <option value="{{ $uni->id }}">{{ $uni->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- ESTABLISHMENT --}}
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1.5">
            Établissement
        </label>

        <select id="establishment" name="establishment_id"
                class="w-full pl-3 pr-8 py-2.5 rounded-lg border border-slate-300 text-sm bg-white">
            <option value="">-- Sélectionner établissement --</option>
        </select>
    </div>

</div>

                <div class="grid sm:grid-cols-2 gap-5 mb-2">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Année scolaire</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </span>
                            <input type="text" name="annee_scolaire" value="{{ old('annee_scolaire') }}" placeholder="ex: 2025-2026"
                                   class="w-full pl-10 pr-3 py-2.5 rounded-lg border border-slate-300 text-sm placeholder:text-slate-400 focus:border-navy focus:ring-2 focus:ring-navy/20 transition @error('annee_scolaire') border-rose-400 @enderror">
                        </div>
                        @error('annee_scolaire')<p class="text-xs text-rose-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Niveau scolaire</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 z-10">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                            </span>
                            <select name="niveau_scolaire"
                                    class="w-full pl-10 pr-8 py-2.5 rounded-lg border border-slate-300 text-sm appearance-none bg-white focus:border-navy focus:ring-2 focus:ring-navy/20 transition @error('niveau_scolaire') border-rose-400 @enderror">
                                <option value="">-- Sélectionner --</option>
                                <option value="1ère année" {{ old('niveau_scolaire') == '1ère année' ? 'selected' : '' }}>1ère année</option>
                                <option value="2ème année" {{ old('niveau_scolaire') == '2ème année' ? 'selected' : '' }}>2ème année</option>
                                <option value="3ème année" {{ old('niveau_scolaire') == '3ème année' ? 'selected' : '' }}>3ème année</option>
                            </select>
                            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                            </span>
                        </div>
                        @error('niveau_scolaire')<p class="text-xs text-rose-600 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- ===================== SECTION 3: PIÈCE JOINTE ===================== --}}
                <div class="flex items-center gap-3 mb-6 mt-10">
                    <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-navy flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h2 class="text-navy font-bold uppercase tracking-wide text-sm whitespace-nowrap">
                        Pièce jointe
                    </h2>
                    <div class="flex-1 h-px bg-brandred/70"></div>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">CIN (recto/verso)</label>
                    <label class="flex items-center justify-center gap-3 w-full border-2 border-dashed border-slate-300 rounded-lg py-6 px-4 cursor-pointer hover:border-navy hover:bg-navy/[0.02] transition group">
                        <svg class="w-6 h-6 text-slate-400 group-hover:text-navy transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3-3m0 0l3 3m-3-3v9"/></svg>
                        <span class="text-sm text-slate-500 group-hover:text-navy transition">
                            <span class="font-semibold">Cliquez pour choisir un fichier</span> ou glissez-déposez
                        </span>
                        <input type="file" name="cin_recto_verso" class="hidden">
                    </label>
                    @error('cin_recto_verso')<p class="text-xs text-rose-600 mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- SUBMIT --}}
                <button type="submit"
                        class="w-full bg-navy hover:bg-navy-light text-white font-bold uppercase tracking-wide text-sm py-3.5 rounded-lg flex items-center justify-center gap-2 transition shadow-lg shadow-navy/20">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    Envoyer la demande
                </button>
            </form>

            {{-- TRUST FOOTER --}}
            <div class="border-t border-slate-200 px-6 sm:px-10 py-6 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center sm:text-left">
                <div class="flex items-center gap-3 justify-center sm:justify-start">
                    <div class="w-10 h-10 rounded-full bg-navy/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold text-navy text-sm">Sécurisé</p>
                        <p class="text-xs text-slate-500">Vos données sont protégées</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 justify-center sm:justify-start">
                    <div class="w-10 h-10 rounded-full bg-navy/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold text-navy text-sm">Rapide</p>
                        <p class="text-xs text-slate-500">Inscription en quelques minutes</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 justify-center sm:justify-start">
                    <div class="w-10 h-10 rounded-full bg-navy/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold text-navy text-sm">Support</p>
                        <p class="text-xs text-slate-500">05 22 99 60 60</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>