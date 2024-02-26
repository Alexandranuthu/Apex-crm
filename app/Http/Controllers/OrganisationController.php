<?php

namespace App\Http\Controllers;
use App\Models\Organisation;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organisations = Organisation::all();
        return view('organisation.index', compact('organisations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organisation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:organisations,name',
            'industry' => 'required',
            'orgsize' => 'required'
        ]);

        Organisation::create($request->all());

        return redirect()->route('organisation.index')->with('success', 'Organisation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisation $organisation)
    {
        return view('organisation.show', compact('organisation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisation $organisation)
    {
        return view('organisation.edit', compact('organisation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisation $organisation)
    {
        $request->validate([
            'name' => 'required|unique:organisations,name,' . $organisation->id,
            'industry' => 'required',
            'orgsize' => 'required'
        ]);

        $organisation->update($request->all());

        return redirect()->route('organisations.index')->with('success', 'Organisation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisation $organisation)
    {
        $organisation->delete();

        return redirect()->route('organisations.index')->with('success', 'Organisation deleted successfully');
    }
}
