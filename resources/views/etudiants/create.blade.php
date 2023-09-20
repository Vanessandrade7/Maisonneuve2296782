@extends('layout')

@section('title', 'Ajouter un étudiant')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Ajouter un étudiant</h2>
        
        <form action="{{ route('etudiants.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="date_de_naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" required>
            </div>

            <div class="mb-3">
                <label for="ville_id" class="form-label">Ville</label>
                <select class="form-control" id="ville_id" name="ville_id">
                    @foreach($villes as $ville)
                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
