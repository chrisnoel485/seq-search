<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asetposisi extends Model
{
    use HasFactory;
    protected $fillable = [
        'aset_id',
        'letak_id',
    ];

    public function letak()
        {
            return $this->belongsToMany('App\Models\Letak');
        }
    public function aset()
        {
            return $this->belongsToMany('App\Models\Aset');
        }
}
