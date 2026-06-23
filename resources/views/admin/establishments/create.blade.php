<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un établissement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body { background: #f4f6f9; }
        .sidebar { background: #0A1E5C; min-height: 100vh; width: 260px; }
        .sidebar .nav-link { color: #f4f6f9; font-weight: 500; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background: rgba(255,255,255,0.08); }
        .page-header { border-bottom: 2px solid #d11f26; }
        .card-form { background: #fff; border: 1px solid rgba(10, 30, 92, 0.12); }
        .btn-primary { background-color: #0A1E5C; border-color: #0A1E5C; }
        .btn-primary:hover { background-color: #08184a; border-color: #08184a; }
        .form-control, .form-select { border-color: rgba(10, 30, 92, 0.25); }
        .form-control:focus, .form-select:focus { border-color: #0A1E5C; box-shadow: 0 0 0 0.2rem rgba(10,30,92,0.15); }
    </style>
</head>
<body>
<div class="d-flex flex-column flex-lg-row">
    <aside class="sidebar text-white d-flex flex-column p-4">
        <div class="brand-zone mb-4 text-center">
            <img src="{{ asset('storage/logo/axa.jpg') }}?v={{ time() }}" alt="Logo AXA" class="img-fluid rounded shadow-sm mb-2" style="max-width: 80px; border: 2px solid #f8f1f1;">
            <h6 class="m-0 fw-bold text-white" style="font-size: 12px; letter-spacing: 1px;">AXA ASSURANCE GUISSER</h6>
            <small class="text-muted" style="font-size: 10px;">تأمينات أكسـا جيسر</small>
        </div>

        <nav class="nav nav-pills flex-column gap-2">
            <a class="nav-link" href="{{ route('admin.index') }}"><i class="fa-solid fa-tachometer-alt me-2"></i>Dashboard</a>
            <a class="nav-link" href="{{ route('admin.universities.index') }}"><i class="fa-solid fa-university me-2"></i>Universités</a>
            <a class="nav-link active" href="{{ route('admin.establishments.index') }}"><i class="fa-solid fa-graduation-cap me-2"></i>Établissements</a>
            <a class="nav-link" href="#"><i class="fa-solid fa-users me-2"></i>Utilisateurs</a>
            <a class="nav-link" href="#"><i class="fa-solid fa-sign-out-alt me-2"></i>Déconnexion</a>
        </nav>
    </aside>

    <main class="flex-grow-1 p-4">
        <div class="container-fluid px-0">
            <div class="mb-4 pb-2 page-header">
                <h2 class="fw-semibold">Ajouter un établissement</h2>
            </div>

            <div class="card card-form shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('admin.establishments.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="university_id" class="form-label">Université</label>
                            <select class="form-select @error('university_id') is-invalid @enderror" id="university_id" name="university_id" required>
                                <option value="">Sélectionner une université</option>
                                @foreach ($universities as $university)
                                    <option value="{{ $university->id }}" {{ old('university_id') == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
                                @endforeach
                            </select>
                            @error('university_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save me-2"></i>Enregistrer</button>
                        <a href="{{ route('admin.establishments.index') }}" class="btn btn-outline-secondary">Retour</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
