<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    protected static $logAttributes = ['*'];

    protected $table = 'matches';

    protected $fillable = [
        'season',
        'championship',
        'team',
        'home_goals',
        'visitor_goals'
    ];

}
