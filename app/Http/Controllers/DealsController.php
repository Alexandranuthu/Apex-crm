<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Deals;

class DealsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deals = Deals::all();
        return view('deals.index', ['deals' => $deals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'owner' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|integer',
            'start_date' => 'required|date',
            'close_date' => 'required|date',
        ]);

        $deal = Deals::create($request->all());
         // Redirect to the index page after creating the deal
         return redirect()->route('Deals.index')->with('success', 'Deal created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $deal =  Deals::find($id);

        if (!$deal) {
            return redirect()->route('deals.index')->with('error', 'Deal not found');
        }

        return view('deals.show', ['deal' => $deal]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $deal = Deals::find($id);


        if (!$deal) {
            return redirect()->route('deals.index')->with('error', 'Deal not found');
        }

        return view('deals.edit', ['deal' => $deal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $deal = Deals::find($id);

        if (!$deal) {
            return redirect()->route('Deals.index')->with('error', 'Deal not found');
        }
        $request->validate([
            'name' => 'string',
            'description' => 'string',
            'owner' => 'string',
            'amount' => 'numeric',
            'status' => 'integer',
            'start_date' => 'date',
            'close_date' => 'date',
        ]);
        $deal->update($request->all());
        return redirect()->route('Deals.index')->with('success', 'Deal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deal = Deals::find($id);

        if (!$deal) {
            return redirect()->route('Deals.index')->with('error', 'Deal not found');
        }

        $deal->delete();
        redirect()->route('Deals.index')->with('success', 'Deal deleted successfully');
    }
}
