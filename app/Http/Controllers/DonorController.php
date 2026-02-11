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
            'willing_to_fast' => 'boolean',
            'willing_to_receive_mail' => 'boolean',
            'willing_to_help_special_needs' => 'boolean',
        ]);

        $donor = \App\Models\Donor::create($validated);

        return redirect()->route('donors.edit', $donor)->with('success', 'Donor registered successfully.');
    }

    public function verify(Request $request, \App\Models\Donor $donor)
    {
        $request->validate([
            'phone_verify' => 'required|digits:4'
        ]);

        // Check if donor has phone registered
        if (empty($donor->phone)) {
            return back()->withErrors([
                'phone_verify' => 'Nomor HP tidak terdaftar. Silakan hubungi petugas.'
            ])->withInput();
        }

        // Verify last 4 digits
        $lastFour = substr($donor->phone, -4);
        if ($request->phone_verify !== $lastFour) {
            return back()->withErrors([
                'phone_verify' => 'Nomor HP tidak sesuai. Silakan hubungi petugas.'
            ])->withInput();
        }

        // Success: redirect to edit page
        return redirect()->route('donors.edit', $donor);
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
            'awards' => 'nullable|array',
            'awards.*' => 'string',
            'willing_to_fast' => 'boolean',
            'willing_to_receive_mail' => 'boolean',
            'willing_to_help_special_needs' => 'boolean',
            'last_donor_date' => 'nullable|date',
            'total_donations' => 'integer',
        ]);

        $donor->update($validated);

        if ($request->has('queue')) {
            // Add to queue directly
            $nextQueue = \App\Models\Queue::whereDate('created_at', now()->today())->max('queue_number') + 1;
            $queue = \App\Models\Queue::create([
                'donor_id' => $donor->id,
                'queue_number' => $nextQueue
            ]);
            return redirect()->route('queues.print', $queue);
        }

        return redirect()->route('donors.edit', $donor)->with('success', 'Donor updated successfully.');
    }}
