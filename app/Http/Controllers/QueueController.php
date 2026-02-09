<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'donor_id' => 'required|exists:donors,id',
        ]);

        $queue = \App\Models\Queue::create($validated);

        return redirect()->route('queues.print', $queue);
    }

    public function print(\App\Models\Queue $queue)
    {
        $donor = $queue->donor;
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('queue.print', compact('queue', 'donor'));
        return $pdf->stream('queue-' . $queue->id . '.pdf');
    }}
