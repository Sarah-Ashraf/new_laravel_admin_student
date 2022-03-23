<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable =[
        'ssn',
        'phone',
        'stname',
        'stusername',
        'stpassowrd',
        'nationality',
        'level',
        'gpa',
        'acadamiccode',

    ];
}
