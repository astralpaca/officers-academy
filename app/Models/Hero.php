<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $hidden = array('pivot');

    use HasFactory;

    protected $fillable = ['id', 'firstname', 'surname'];

    public function campaigns() {
        return $this->belongsToMany(Campaign::class, 'campaign_hero');
    }
}
