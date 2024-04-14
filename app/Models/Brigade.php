<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brigade extends Model
{
    protected $fillable = ['board_number', 'first_user', 'second_user', 'third_user', 'brigade_tablet_phone_number'];


    use HasFactory;
}
