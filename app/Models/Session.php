<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = ['code'];

    use HasFactory;

    public static function exists($code){
        return ( Session::where('code', $code)->first() != null );
    }
}
