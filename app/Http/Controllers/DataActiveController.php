<?php

namespace App\Http\Controllers;

use App\Models\DataActive;
use Illuminate\Http\Request;

class DataActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        DataActive::insert($request->all());
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DataActive $dataActive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataActive $dataActive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataActive $dataActive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataActive $dataActive)
    {
        //
    }
}
