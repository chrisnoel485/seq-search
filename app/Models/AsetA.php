<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetA extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
    ];
    public function letaka()
        {
            return $this->belongsToMany(LetakA::class);
            //return $this->belongsToMany('App\Models\Letak', 'letak_id');
            //return $this->belongsTo('App\Models\Letak', 'letak_id');
        }
}
