<?php

namespace HexGad\Countries\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $casts = ['has_access' => 'boolean'];

    protected $fillable = ['name', 'iso', 'has_access'];
}
