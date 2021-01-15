<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];

    public function designated_heroes() {
        return $this->belongsToMany(Hero::class, 'campaign_hero')->where('optional', false);
    }

    public function recruitable_heroes(){
        return $this->belongsToMany(Hero::class, 'campaign_hero')->where('optional', true);
    }
}
