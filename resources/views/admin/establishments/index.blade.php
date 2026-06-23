<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Établissements - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f4f6f9;
            min-height: 100vh;
        }
        .sidebar {
            background: #0a1128;
            min-height: 100vh;
            width: 260px;
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
        .table-card {
            background: #ffffff;
            border: none;
        }
        .table-card thead {
            background: #0033aa;
            color: #ffffff;
        }
        .btn-action {
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
            <a class="nav-link" href="#">
                <i class="fa-solid fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a class="nav-link active" href="{{ route('admin.establishments.index') }}">
                <i class="fa-solid fa-graduation-cap me-2"></i>Établissements
            </a>
            <a class="nav-link" href="#">
                <i class="fa-solid fa-users me-2"></i>Utilisateurs
            </a>
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-sign-out-alt me-2"></i>Déconnexion
            </a>
        </nav>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </aside>

    <main class="flex-grow-1 p-4">
        <div class="container-fluid px-0">
            
            @if (session('success'))
                <div class="alert alert-success shadow-sm alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-4 pb-2 page-header d-flex align-items-center justify-content-between">
                <h2 class="fw-semibold m-0">Gestion des Établissements</h2>
                <a href="{{ route('admin.establishments.create') }}" class="btn btn-primary shadow-sm">
                    <i class="fa-solid fa-plus me-2"></i>Ajouter un établissement
                </a>
            </div>

            <div class="card table-card shadow-sm">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 80px;">#</th>
                                    <th>Nom de l'établissement</th>
                                    <th>Université affiliée</th>
                                    <th>Date de création</th>
                                    <th class="text-end" style="width: 120px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($establishments as $establishment)
                                    <tr>
                                        <td class="fw-bold text-muted">{{ $establishment->id }}</td>
                                        <td>
                                            <span class="fw-semibold text-dark">{{ $establishment->name }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-primary border border-primary-subtle px-2.5 py-1.5 fs-7">
                                                <i class="fa-solid fa-university me-1"></i>
                                                {{ $establishment->university->name ?? 'Aucune' }}
                                            </span>
                                        </td>
                                        <td class="text-muted">{{ $establishment->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-end">
                                            <button type="button" 
                                                    class="btn btn-outline-danger btn-action" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteModal" 
                                                    data-id="{{ $establishment->id }}"
                                                    data-name="{{ $establishment->name }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-5">
                                            <i class="fa-solid fa-folder-open fs-2 mb-2 d-block opacity-50"></i>
                                            Aucun établissement enregistré pour le moment.
                                        </td>
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

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel"><i class="fa-solid fa-triangle-exclamation me-2"></i>Confirmation de suppression</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <p class="m-0 fs-5 text-secondary">Êtes-vous sûr de vouloir supprimer l'établissement :</p>
                <p class="fw-bold text-danger fs-4 my-2" id="establishment-name-modal"></p>
                <small class="text-muted">Cette action est irréversible.</small>
            </div>
            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form id="delete-form-modal" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Script JS pour charger dynamiquement les données dans le modal de suppression
    const deleteModal = document.getElementById('deleteModal');
    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const establishmentId = button.getAttribute('data-id');
            const establishmentName = button.getAttribute('data-name');
            
            const modalNameContainer = deleteModal.querySelector('#establishment-name-modal');
            const deleteForm = deleteModal.querySelector('#delete-form-modal');
            
            modalNameContainer.textContent = establishmentName;
            // Met à jour dynamiquement l'action du formulaire vers la route destroy
            deleteForm.action = `/admin/establishments/${establishmentId}`;
        });
    }
</script>
</body>
</html>