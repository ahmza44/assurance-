<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Établissements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body { background: #f4f6f9; }
        .sidebar { background: #0A1E5C; min-height: 100vh; width: 260px; }
        .sidebar .nav-link { color: #f4f6f9; font-weight: 500; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background: rgba(255,255,255,0.08); }
        .page-header { border-bottom: 2px solid #d11f26; }
        .table-card { background: #fff; }
        .table-card thead { background: #0A1E5C; color: #fff; }
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
         
            <a class="nav-link" href="#"><i class="fa-solid fa-sign-out-alt me-2"></i>Déconnexion</a>
        </nav>
    </aside>

    <main class="flex-grow-1 p-4">
        <div class="container-fluid px-0">
            @if (session('success'))
                <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
            @endif

            <div class="mb-4 pb-2 page-header">
                <h2 class="fw-semibold">Établissements</h2>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('admin.establishments.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Ajouter</a>
            </div>

            <div class="card table-card shadow-sm">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Université Parente</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($establishments as $establishment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $establishment->name }}</td>
                                        <td>{{ $establishment->university?->name ?? '—' }}</td>
                                        <td>
                                                    <a href="{{ route('admin.establishments.edit', $establishment->id) }}" class="btn btn-sm btn-outline-primary me-2"><i class="fa-solid fa-edit"></i></a>
                                           
                                            <form action="{{ route('admin.establishments.destroy', $establishment) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer cet établissement ?')"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">Aucun établissement pour le moment</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
