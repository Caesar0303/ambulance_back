<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbulanceHistory extends Model
{
    public function brigade()
    {
        return $this->belongsTo(Brigade::class);
    }

    use HasFactory;
}
