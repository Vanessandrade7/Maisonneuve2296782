@extends('layout')

@section('title', 'Modifier un étudiant')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Modifier l'étudiant</h2>

    <form action="{{ route('etudiants.update', $etudiant) }}" method="post">
        @csrf
        @method('PUT')

        <!-- Champ Nom -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $etudiant->nom) }}" required>
        </div>

        <!-- Champ Adresse -->
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse', $etudiant->adresse) }}" required>
        </div>

        <!-- Champ Téléphone -->
        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $etudiant->phone) }}" required>
        </div>

        <!-- Champ Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $etudiant->email) }}" required>
        </div>

        <!-- Champ Date de naissance -->
        <div class="mb-3">
            <label for="date_de_naissance" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{ old('date_de_naissance', $etudiant->date_de_naissance->format('Y-m-d')) }}" required>
        </div>

        <!-- Champ Ville (select) -->
        <div class="mb-3">
            <label for="ville_id" class="form-label">Ville</label>
            <select class="form-select" id="ville_id" name="ville_id" required>
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}" {{ old('ville_id', $etudiant->ville_id) == $ville->id ? 'selected' : '' }}>{{ $ville->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
