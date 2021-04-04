<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'second_name',
        'first_name',
        'middle_name',
        'dob',
        'sex',
        'dominant_hand',
        'diagnosis'
    ];
}
