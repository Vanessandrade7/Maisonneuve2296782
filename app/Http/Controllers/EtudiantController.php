<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiants.create', compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:etudiants',
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id',
        ]);

        // Créer un nouvel étudiant avec les données validées
        $etudiant = Etudiant::create($data);

        // Rediriger vers une page (par exemple, la liste des étudiants) avec un message de réussite
        return redirect()->route('etudiants.index')->with('success', 'Étudiant créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        // Trouver l'étudiant par ID
        $etudiant = Etudiant::findOrFail($id);
        $villes = Ville::all();

        // Afficher la vue 'show' avec l'étudiant
        return view('etudiants.show', compact('etudiant', 'villes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Trouver l'étudiant par ID
        $etudiant = Etudiant::findOrFail($id);

        // Récupérer toutes les villes pour le champ select
        $villes = Ville::all();

        // Retourner la vue d'édition avec les données
        return view('etudiants.edit', compact('etudiant', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Trouver l'étudiant par ID
        $etudiant = Etudiant::findOrFail($id);

        // Valider les données du formulaire
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:etudiants,email,' . $etudiant->id,
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id',
        ]);

        // Mettre à jour l'étudiant avec les données validées
        $etudiant->update($data);

        // Rediriger vers la page de détails de l'étudiant avec un message de réussite
        return redirect()->route('etudiants.show', $etudiant)->with('success', 'Étudiant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Trouver l'étudiant par ID
        $etudiant = Etudiant::findOrFail($id);

        // Supprimer l'étudiant
        $etudiant->delete();

        // Rediriger vers la liste des étudiants avec un message de réussite
        return redirect()->route('etudiants.index')
            ->with('success', 'Étudiant supprimé avec succès.');
    }
}