<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $cast = [
        'important'=> 'boolean'
    ];

    protected $fillable= ['titre', 'start_at', 'end_at', 'important'];
}
