<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class MemoryCard extends Model
{
    use HasFactory;

    protected $table = 'memorycards';

    protected $fillable = ['code', 'campaign_id'];

    public static function get(){
        $code = Session::get('code');
        return MemoryCard::where('code', $code)->first();
    }

    public static function exists($code){
        return ( MemoryCard::where('code', $code)->first() != null );
    }

    public function selected_campaign(){
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    public function selected_heroes() {
        return $this->belongsToMany(Hero::class, 'hero_memorycard', 'memorycard_id', 'hero_id');
    }
}
