<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index(Request $request)
    {
        $donors = [];
        if ($request->has('day') && $request->has('month') && $request->has('year')) {
            $date = \Carbon\Carbon::createFromDate($request->year, $request->month, $request->day);
            $donors = \App\Models\Donor::whereDate('birth_date', $date->format('Y-m-d'))->get();
        }

        return view('donors.index', compact('donors'));
    }

    public function create()
    {
        return view('donors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
            'house_number' => 'nullable|string',
            'rt_rw' => 'nullable|string',
            'village' => 'nullable|string',
            'district' => 'nullable|string',
            'region' => 'nullable|string',
            'phone' => 'nullable|string',
            'occupation' => 'nullable|string',
        ]);

        $donor = \App\Models\Donor::create($validated);

        return redirect()->route('donors.edit', $donor)->with('success', 'Donor registered successfully.');
    }

    public function edit(\App\Models\Donor $donor)
    {
        return view('donors.edit', compact('donor'));
    }

    public function update(Request $request, \App\Models\Donor $donor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
            'house_number' => 'nullable|string',
            'rt_rw' => 'nullable|string',
            'village' => 'nullable|string',
            'district' => 'nullable|string',
            'region' => 'nullable|string',
            'phone' => 'nullable|string',
            'occupation' => 'nullable|string',
            'donor_card_number' => 'nullable|string',
            'awards' => 'nullable|string',
            'willing_to_fast' => 'boolean',
            'last_donor_date' => 'nullable|date',
            'total_donations' => 'integer',
        ]);

        $donor->update($validated);

        if ($request->has('queue')) {
            // Add to queue directly
            $queue = \App\Models\Queue::create(['donor_id' => $donor->id]);
            return redirect()->route('queues.print', $queue);
        }

        return redirect()->route('donors.edit', $donor)->with('success', 'Donor updated successfully.');
    }}
