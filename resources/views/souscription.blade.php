<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="mb-4 text-center">Formulaire de souscription</h3>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('souscription.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Établissement</label>
                            <input type="text" name="etablissement" value="{{ old('etablissement') }}"
                                   class="form-control @error('etablissement') is-invalid @enderror">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" name="nom" value="{{ old('nom') }}"
                                       class="form-control @error('nom') is-invalid @enderror">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Prénom</label>
                                <input type="text" name="prenom" value="{{ old('prenom') }}"
                                       class="form-control @error('prenom') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Téléphone</label>
                                <input type="text" name="telephone" value="{{ old('telephone') }}"
                                       class="form-control @error('telephone') is-invalid @enderror">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">CIN</label>
                                <input type="text" name="cin" value="{{ old('cin') }}"
                                       class="form-control @error('cin') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Année scolaire</label>
                                <input type="text" name="annee_scolaire" value="{{ old('annee_scolaire') }}"
                                       placeholder="ex: 2025-2026"
                                       class="form-control @error('annee_scolaire') is-invalid @enderror">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Niveau scolaire</label>
                                <select name="niveau_scolaire" class="form-select @error('niveau_scolaire') is-invalid @enderror">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="1ère année" {{ old('niveau_scolaire') == '1ère année' ? 'selected' : '' }}>1ère année</option>
                                    <option value="2ème année" {{ old('niveau_scolaire') == '2ème année' ? 'selected' : '' }}>2ème année</option>
                                    <option value="3ème année" {{ old('niveau_scolaire') == '3ème année' ? 'selected' : '' }}>3ème année</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CIN (recto/verso)</label>
                            <input type="file" name="cin_recto_verso"
                                   class="form-control @error('cin_recto_verso') is-invalid @enderror">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Envoyer la demande</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>