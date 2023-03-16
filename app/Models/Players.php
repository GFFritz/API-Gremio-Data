<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;

    protected static $logAttributes = ['*'];

    protected $table = 'players';

    protected $fillable = [
        'name',
        "age",
        "country",
        "nickname",
        "height",
        "number",
        "foot",
        "position",
        "former_clubs",
        "active"
    ];
}
