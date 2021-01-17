<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoryCard extends Model
{
    use HasFactory;

    protected $table = 'memorycards';

    protected $fillable = ['code'];

    use HasFactory;

    public static function get(){

    }

    public static function exists($code){
        return ( MemoryCard::where('code', $code)->first() != null );
    }

    public function selected_heroes() {
        return $this->belongsToMany(Hero::class, 'hero_memorycard');
    }
}
