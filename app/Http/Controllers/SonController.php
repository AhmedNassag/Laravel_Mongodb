<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sons = auth()->user()->sons;
        return view('sons.index', compact('sons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string',
            'birth_date' => 'required|date_format:Y-m-d'
        ]);

        auth()->user()->sons()->create([
            'name'       => $request->input('name'),
            'birth_date' => $request->input('birth_date'),
        ]);

        return back()->with('status', 'Son is created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
