<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Donor;

class Queue extends Model
{
    protected $fillable = ['donor_id', 'queue_number'];

    public static function generateForDonor($donorId)
    {
        return \Illuminate\Support\Facades\DB::transaction(function () use ($donorId) {
            $lastQueue = self::whereDate('created_at', now()->today())
                             ->lockForUpdate()
                             ->orderByDesc('queue_number')
                             ->first();

            $nextQueue = $lastQueue ? $lastQueue->queue_number + 1 : 1;

            return self::create([
                'donor_id' => $donorId,
                'queue_number' => $nextQueue
            ]);
        });
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
    //
}
