<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroMemoryCard extends Model
{
    use HasFactory;

    protected $table = 'hero_memorycard';

    protected $fillable = ['hero_id', 'memorycard_id'];
}
