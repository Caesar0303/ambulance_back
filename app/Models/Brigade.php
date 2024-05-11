<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brigade extends Model
{
    protected $fillable = ['board_number', 'first_user', 'second_user', 'third_user', 'brigade_tablet_phone_number'];

    public function brigade()
    {
        return $this->belongsTo(User::class, 'brigade_id', 'id');
    }
    public function histories()
    {
        return $this->hasMany(AmbulanceHistory::class, 'board_number', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'first_user', 'id');
    }

    public function feldsher()
    {
        return $this->belongsTo(User::class, 'second_user', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'third_user', 'id');
    }

    use HasFactory;
}
