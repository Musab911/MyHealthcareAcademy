<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'duration',
        'city',
        'industry',
        'positions',
        'price', // Add 'price' field to the $fillable array
    ];

    protected $casts = [
        'start_date' => 'date',
    ];
}
