<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignHero extends Model
{
    use HasFactory;

    protected $table = 'campaign_hero';

    protected $fillable = ['campaign_id', 'hero_id'];
}
