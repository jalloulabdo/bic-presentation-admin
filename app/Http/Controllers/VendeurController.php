<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendeurFormRequest;
use App\Models\Vendeur;
use Illuminate\Http\Request;

class VendeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendeurs = Vendeur::orderBy('id')->get();

        return $vendeurs;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendeurFormRequest $request)
    {
        $Vendeur     = Vendeur::create(['name' => $request->name, 'email' => $request->email, 'serial' => $request->serial]);
        return response()->json(['success' => true, 'data' => $Vendeur]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendeur $vendeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendeur $vendeur)
    {
        return $vendeur;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendeurFormRequest $request, Vendeur $vendeur)
    {
        $vendeur->update([
            'name' => $request->name,
            'email' => $request->email,
            'serial' => $request->serial
        ]);

        return response()->json(['success' => true, 'data' => $vendeur]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendeur $vendeur)
    {
        $vendeur->delete();
        return response()->json(['success' => true]);
    }


     /**
     * get Vendeur.
     */
    public function getVendeur($serial){
       $vendeur = Vendeur::where('serial',$serial)->first();
       return response()->json(['success' => true, 'data' =>$vendeur ]);
    }
}
