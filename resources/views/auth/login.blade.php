<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <script src="https://cdn.tailwindcss.com"></script>

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
</head>

<body class="min-h-screen bg-slate-100 flex items-center justify-center px-4">

<div class="w-full max-w-md">

    <!-- CARD -->
    <div class="bg-white rounded-xl shadow-md border border-slate-200">

        <!-- HEADER SIMPLE -->
        <div class="px-6 pt-6 pb-4 text-center border-b border-slate-100">
            
            <div class="flex justify-center mb-3">
                <div class="w-12 h-12 rounded-lg bg-navy flex items-center justify-center">
                    <img src="{{ asset('storage/logo/logo.png') }}"
                         class="w-7 h-7 object-contain"
                         alt="Logo"
                         onerror="this.style.display='none'">
                </div>
            </div>

            <h1 class="text-lg font-semibold text-slate-800">Connexion</h1>
            <p class="text-sm text-slate-500">Accès à votre espace sécurisé</p>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}" class="px-6 py-6 space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="text-xs font-medium text-slate-600">Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       class="mt-1 w-full px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy">
            </div>

            <!-- Password -->
            <div>
                <label class="text-xs font-medium text-slate-600">Mot de passe</label>

                <div class="relative mt-1">
                    <input type="password"
                           id="password"
                           name="password"
                           required
                           class="w-full px-3 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy">

                    <button type="button"
                            onclick="togglePassword()"
                            class="absolute right-3 top-2.5 text-slate-400 text-xs">
                        Afficher
                    </button>
                </div>
            </div>

            <!-- OPTIONS -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-slate-600">
                    <input type="checkbox" class="rounded border-slate-300">
                    Se souvenir
                </label>

               <a href="{{ route('password.request') }}" class="text-navy hover:underline text-sm">
    Mot de passe oublié ?
</a>
            </div>

            <!-- BUTTON -->
            <button class="w-full bg-navy text-white py-2.5 rounded-md text-sm font-medium hover:bg-[#132a78] transition">
                Se connecter
            </button>

        </form>
    </div>

    <p class="text-center text-xs text-slate-400 mt-4">
        © {{ date('Y') }} - Accès sécurisé
    </p>

</div>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>

</body>
</html>