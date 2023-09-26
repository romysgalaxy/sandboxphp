<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller
{
    // Affiche la liste de tous les chats
    public function index()
    {
        $cats = Cat::all();
        return view('cats.index', ['cats' => $cats]);
    }

    // Affiche les détails d'un chat spécifique
    public function show($id)
    {
        $cat = Cat::find($id);
        return view('cats.show', ['cat' => $cat]);
    }

    // Affiche le formulaire de création d'un nouveau chat
    public function create()
    {
        return view('cats.create');
    }

    // Enregistre un nouveau chat dans la base de données
    public function store(Request $request)
    {
        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->store('images/cats', 'public');
            $cat = new Cat([
                'name' => $request->input('name'),
                'breed' => $request->input('breed'),
                'age' => $request->input('age'),
                'ability' => $request->input('ability'),
                'picture' => $imagePath,
            ]);
            $cat->save();
            return redirect()->route('cats.index')->with('success', 'Chat créé avec succès.');
        }

        // Valider les données du formulaire si aucun fichier n'a été téléchargé
        $request->validate([
            'name' => 'required|string',
            'picture' => 'required|string',
            'breed' => 'required|string',
            'age' => 'required|integer',
            'ability' => 'required|string',
        ]);

        // Créer un nouvel objet Cat et le sauvegarder dans la base de données
        Cat::create($request->all());

        // Rediriger vers la liste des chats
        return redirect()->route('cats.index')->with('success', 'Chat créé avec succès.');
    }

    // Affiche le formulaire de modification d'un chat
    public function edit($id)
    {
        $cat = Cat::find($id);
        return view('cats.edit', ['cat' => $cat]);
    }

    // Met à jour les informations d'un chat dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'breed' => 'required|string',
            'age' => 'required|integer',
            'ability' => 'required|string',
        ]);

        $cat = Cat::findOrFail($id);

        // Mettre à jour les autres champs
        $cat->name = $request->input('name');
        $cat->breed = $request->input('breed');
        $cat->age = $request->input('age');
        $cat->ability = $request->input('ability');

        // Vérifier si un nouveau fichier image a été fourni
        if ($request->hasFile('new_picture')) {
            // Supprimer l'ancienne image
            if ($cat->picture) {
                Storage::disk('public')->delete($cat->picture);
            }

            // Stocker le nouveau fichier image et mettre à jour le champ 'picture'
            $imagePath = $request->file('new_picture')->store('images/cats', 'public');
            $cat->picture = $imagePath;
        }

        $cat->save();

        return redirect()->route('cats.index')->with('success', 'Chat mis à jour avec succès.');
        // $cat = Cat::findOrFail($id);

        // if ($request->hasFile('picture')) {
        //     // Supprimer l'ancienne image si elle existe
        //     if ($cat->picture) {
        //         Storage::disk('public')->delete($cat->picture);
        //     }

        //     $imagePath = $request->file('picture')->store('images/cats', 'public');
        //     $cat->update([
        //         'name' => $request->input('name'),
        //         'breed' => $request->input('breed'),
        //         'age' => $request->input('age'),
        //         'ability' => $request->input('ability'),
        //         'picture' => $imagePath,
        //     ]);
        //     return redirect()->route('cats.index')->with('success', 'Chat mis à jour avec succès.');
        // } else {
        //     $cat->update([
        //         'name' => $request->input('name'),
        //         'breed' => $request->input('breed'),
        //         'age' => $request->input('age'),
        //         'ability' => $request->input('ability'),
        //     ]);
        //     return redirect()->route('cats.index')->with('success', 'Chat mis à jour avec succès.');
        // }
        //     // Valider les données du formulaire
        //     $request->validate([
        //         'name' => 'required|string',
        //         'picture' => 'required|string',
        //         'breed' => 'required|string',
        //         'age' => 'required|integer',
        //         'ability' => 'required|string',
        //     ]);

        //     // Trouver le chat à mettre à jour
        //     $cat = Cat::find($id);

        //     // Mettre à jour les champs
        //     $cat->update($request->all());

        //     // Rediriger vers la liste des chats
        //     return redirect()->route('cats.index')->with('success', 'Chat mis à jour avec succès.');
    }

    // Supprime un chat de la base de données
    public function destroy($id)
    {
        // Trouver le chat à supprimer
        $cat = Cat::findOrFail($id);

        // Supprimer l'image du chat s'il en a une
        if ($cat->picture) {
            Storage::disk('public')->delete($cat->picture);
        }

        // Supprimer le chat
        $cat->delete();

        // Rediriger vers la liste des chats
        return redirect()->route('cats.index')->with('success', 'Chat supprimé avec succès.');
    }
}
