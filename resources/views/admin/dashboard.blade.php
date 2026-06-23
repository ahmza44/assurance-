<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f4f6f9;
            min-height: 100vh;
        }
        .sidebar {
            background: #0A1E5C;
            min-height: 100vh;
            width: 260px;
        }
        .sidebar .logo-block {
            border-bottom: 1px solid #d11f26;
        }
        .sidebar .nav-link {
            color: #f4f6f9;
            font-weight: 500;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #ffffff;
            background: rgba(255,255,255,0.05);
        }
        .sidebar .nav-link i {
            width: 20px;
        }
        .page-header {
            border-bottom: 2px solid #d11f26;
        }
        .stats-card {
            border: 1px solid rgba(0, 51, 170, 0.12);
        }
        .table-card {
            background: #ffffff;
            border: none;
        }
        .table-card thead {
            background: #0033aa;
            color: #ffffff;
        }
        .status-badge {
            border-radius: 999px;
            font-size: 0.85rem;
            padding: 0.45rem 0.75rem;
        }
        .btn-view {
            font-size: 0.85rem;
            padding: 0.35rem 0.7rem;
        }
        @media (max-width: 991.98px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }
        }
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
            <a class="nav-link active" href="{{ route('admin.index') }}">
                <i class="fa-solid fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a class="nav-link" href="{{ route('admin.universities.index') }}">
                <i class="fa-solid fa-university me-2"></i>Universités
            </a>
            <a class="nav-link" href="{{ route('admin.establishments.index') }}">
                <i class="fa-solid fa-graduation-cap me-2"></i>Établissements
            </a>
         <a class="nav-link" href="{{ route('logout') }}" 
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fa-solid fa-sign-out-alt me-2"></i>Déconnexion
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
        </nav>
    </aside>

    <main class="flex-grow-1 p-4" style="background: #f4f6f9;">
        <div class="container-fluid px-0">
            @if (session('success'))
                <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
            @endif

            <div class="mb-4 pb-2 page-header">
                <h2 class="fw-semibold">Tableau de bord - Souscriptions</h2>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-12 col-md-4">
                    <div class="card stats-card shadow-sm p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-uppercase text-muted">Total Demandes</small>
                                <h3 class="mb-0">18</h3>
                            </div>
                            <div class="text-primary fs-3">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card stats-card shadow-sm p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-uppercase text-muted">Validées</small>
                                <h3 class="mb-0">20</h3>
                            </div>
                            <div class="text-success fs-3">
                                <i class="fa-solid fa-user-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card stats-card shadow-sm p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-uppercase text-muted">En Attente</small>
                                <h3 class="mb-0">0</h3>
                            </div>
                            <div class="text-warning fs-3">
                                <i class="fa-solid fa-user-clock"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card table-card shadow-sm">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>CIN</th>
                                    <th>Email</th>
                                    <th>Établissement</th>
                                    <th>Année scolaire</th>
                                    <th>Niveau</th>
                                    <th>CIN (fichier)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->nom }}</td>
                                        <td>{{ $student->prenom }}</td>
                                        <td>{{ $student->telephone }}</td>
                                        <td>{{ $student->cin }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->etablissement }}</td>
                                        <td>{{ $student->annee_scolaire }}</td>
                                        <td>{{ $student->niveau_scolaire }}</td>
                                        <td>
                                            @if ($student->cin_recto_verso)
                                                <a href="{{ asset('storage/' . $student->cin_recto_verso) }}" target="_blank" class="btn btn-outline-primary btn-view">Voir</a>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-muted py-4">Aucune souscription pour le moment</td>
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
