<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'gender',
        'address',
        'house_number',
        'rt_rw',
        'village',
        'district',
        'region',
        'phone',
        'occupation',
        'donor_card_number',
        'awards',
        'willing_to_fast',
        'last_donor_date',
        'total_donations',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'last_donor_date' => 'date',
        'willing_to_fast' => 'boolean',
    ];

    public function queues()
    {
        return $this->hasMany(Queue::class);
    }
}
