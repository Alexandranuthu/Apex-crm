<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::paginate(10); // Assuming pagination with 10 leads per page
        return view('lead.index', compact('leads'));
    }

    public function create()
    {
        return view('lead.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Lead::create($request->all());
        
        $notification = [
            'message' => 'Lead created successfully!',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('lead.index')->with($notification);
    }

    public function show(Lead $lead)
    {
        if (!$lead) {
            return redirect()->route('lead.index')->with('error', 'Lead not found');
        }

        return view('lead.show', ['lead' => $lead]);
    }

    public function edit(Lead $lead)
    {
        if (!$lead) {
            return redirect()->route('lead.index')->with('error', 'Lead not found');
        }

        return view('lead.edit', ['lead' => $lead]);
    }

    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $lead->update($request->all());

        return redirect()->route('lead.index')->with('success', 'Lead updated successfully');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()->route('lead.index')->with('success', 'Lead deleted successfully');
    }
}
