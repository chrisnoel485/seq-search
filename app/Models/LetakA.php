<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetakA extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
    ];
    public function aseta()
        {
            return $this->belongsToMany(AsetA::class);
            //return $this->belongsToMany('App\Models\Aset', 'letak_id');
            //return $this->hasOne('App\Models\AsetA', 'letak_id');
        }
}
