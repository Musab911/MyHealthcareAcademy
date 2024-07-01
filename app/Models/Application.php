<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'internship_name',
        'first_industry',
        'first_field1',
        'first_field2',
        'first_field3',
        'first_field4',
        'first_field5',
        'second_industry',
        'second_field1',
        'second_field2',
        'second_field3',
        'second_field4',
        'second_field5',
        'city',
        'duration_weeks',
        'start_date',
        'price',
        'firstName',
        'lastName',
        'dateOfBirth',
        'gender',
        'nationality',
        'phone',
        'emailAddress',
        'nativeLanguage',
        'englishLevel',
        'motivation',
        'degree',
    ];
}
