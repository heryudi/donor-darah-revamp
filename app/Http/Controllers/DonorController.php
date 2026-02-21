<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index(Request $request)
    {
        $donors = [];
        if ($request->has(['day', 'month', 'year'])) {
            $request->validate([
                'day' => 'required|integer|between:1,31',
                'month' => 'required|integer|between:1,12',
                'year' => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            if (checkdate($request->month, $request->day, $request->year)) {
                $date = \Carbon\Carbon::createFromDate($request->year, $request->month, $request->day);
                $donors = \App\Models\Donor::whereDate('birth_date', $date->format('Y-m-d'))->get();
            } else {
                return back()->withErrors(['date' => 'Tanggal tidak valid.'])->withInput();
            }
        }

        return view('donors.index', compact('donors'));
    }

    public function create()
    {
        return view('donors.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'willing_to_fast' => $request->boolean('willing_to_fast'),
            'willing_to_receive_mail' => $request->boolean('willing_to_receive_mail'),
            'willing_to_help_special_needs' => $request->boolean('willing_to_help_special_needs'),
        ]);

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
        $errorBag = 'verify_' . $donor->id;

        $request->validateWithBag($errorBag, [
            'phone_verify' => 'required|digits:4'
        ]);

        // Check if donor has phone registered
        if (empty($donor->phone)) {
            return back()->withErrors([
                'phone_verify' => 'Nomor HP tidak terdaftar. Silakan hubungi petugas.'
            ], $errorBag)->withInput();
        }

        // Verify last 4 digits
        $lastFour = substr($donor->phone, -4);
        if ($request->phone_verify !== $lastFour) {
            return back()->withErrors([
                'phone_verify' => 'Nomor HP tidak sesuai. Silakan hubungi petugas.'
            ], $errorBag)->withInput();
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
        $request->merge([
            'willing_to_fast' => $request->boolean('willing_to_fast'),
            'willing_to_receive_mail' => $request->boolean('willing_to_receive_mail'),
            'willing_to_help_special_needs' => $request->boolean('willing_to_help_special_needs'),
        ]);

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
            $queue = \App\Models\Queue::generateForDonor($donor->id);
            return redirect()->route('queues.print', $queue);
        }

        return redirect()->route('donors.edit', $donor)->with('success', 'Donor updated successfully.');
    }}
