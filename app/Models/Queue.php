<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Donor;

class Queue extends Model
{
    protected $fillable = ['donor_id'];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
    //
}
