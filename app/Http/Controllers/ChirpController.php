<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChirpController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // dd(auth()->user());
        // dd('connected user:', Auth::user());

        return view("chirps.index", [
            'chirps' => Chirp::orderBy('created_at', 'DESC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        //envoi des données au BDD
        $request->user()->chirps()->create($validated);

        //rediriger sur chirps.index
        return redirect(route('chirps.index'));

        // dd($validated);
        // dd($request->user());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp) {
        return view('chirps.edit', ['chirp' => $chirp]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp) {
        // vérifier que l'utilisateur a l'autorization de mettre à jour le commentaire
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]); // validation des données

        $chirp->update($validated); // mise à jour

        return redirect(route('chirps.index')); // redirection
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp) {
        // vérifier l'autorisation du user
        $this->authorize('delete', $chirp);
        // supprimer la resource
        $chirp->delete();
        // rediriger vers la page des commentaires
        return redirect(route('chirps.index'));
    }
}
