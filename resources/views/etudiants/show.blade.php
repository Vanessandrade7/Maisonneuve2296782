@extends('layout')

@section('title', 'Afficher un étudiant')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Détails de l'étudiant</h2>

        <div class="mb-3">
            <strong>Nom:</strong> {{ $etudiant->nom }}
        </div>

        <div class="mb-3">
            <strong>Adresse:</strong> {{ $etudiant->adresse }}
        </div>

        <div class="mb-3">
            <strong>Téléphone:</strong> {{ $etudiant->phone }}
        </div>

        <div class="mb-3">
            <strong>Email:</strong> {{ $etudiant->email }}
        </div>

        <div class="mb-3">
            <strong>Date de naissance:</strong> {{ $etudiant->date_de_naissance->format('d-m-Y') }}
        </div>

        <div class="mb-3">
            <strong>Ville:</strong> {{ $etudiant->ville->nom }}
        </div>

        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
@endsection
