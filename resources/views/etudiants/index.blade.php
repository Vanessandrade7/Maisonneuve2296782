@extends('layout')

@section('title', 'Liste des étudiants')

@section('content')
<script>
    function handleDelete(event) {
        event.stopPropagation();
    }
</script>
    <div class="container mt-5">
        <h1 class="mb-4">Liste des étudiants</h1>
        <a href="{{ route('etudiants.create') }}" class="btn btn-primary mb-3">Ajouter</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($etudiants as $etudiant)
                <tr onclick="window.location.href = '{{ route('etudiants.show', $etudiant->id) }}';" style="cursor:pointer;">
                    <th scope="row">{{ $etudiant->id }}</th>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->adresse }}</td>
                    <td>{{ $etudiant->phone }}</td>
                    <td>{{ $etudiant->email }}</td>
                    <td>{{ $etudiant->date_de_naissance->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('etudiants.destroy', $etudiant) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="handleDelete(event)" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
