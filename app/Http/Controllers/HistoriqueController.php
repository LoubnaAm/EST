<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\Admin;
use App\Http\Requests\StoreHistoriqueRequest;
use App\Http\Requests\UpdateHistoriqueRequest;

class HistoriqueController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHistoriqueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Vérifier si l'ID de l'admin existe
        $adminId = $request->input('admin_id');
        $admin = Admin::find($adminId);

        if ($admin) {
            // L'ID de l'admin existe, procéder à l'insertion dans la table historiques
            Historique::create([
                'admin_id' => $adminId,
                'action' => $request->input('action'),
                'details' => $request->input('details'),
            ]);

            // Autres actions après l'insertion réussie, si nécessaire

            return redirect()->back()->with('success', 'Historique ajouté avec succès.');
        } else {
            // L'ID de l'admin n'existe pas, renvoyer un message d'erreur
            return redirect()->back()->with('error', 'L\'ID de l\'admin est invalide.');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function show(Historique $historique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function edit(Historique $historique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHistoriqueRequest  $request
     * @param  \App\Models\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHistoriqueRequest $request, Historique $historique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historique $historique)
    {
        //
    }
}
