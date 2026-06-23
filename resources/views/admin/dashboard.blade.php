<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h3 class="mb-4">Tableau de bord - Souscriptions</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
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
                            <th>Statut</th>
                            <th>Actions</th>
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
                                        <a href="{{ asset('storage/' . $student->cin_recto_verso) }}" target="_blank">Voir</a>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($student->status === 'valide')
                                        <span class="badge bg-success">Validé</span>
                                    @elseif ($student->status === 'refuse')
                                        <span class="badge bg-danger">Refusé</span>
                                    @else
                                        <span class="badge bg-secondary">En attente</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <form action="{{ route('admin.valider', $student->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Valider</button>
                                        </form>
                                        <form action="{{ route('admin.refuser', $student->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Refuser</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-muted">Aucune souscription pour le moment</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>