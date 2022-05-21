<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;
    #protected $table = 'mereks';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];
    public function aset()
    {
        return $this->hasMany('App\Models\Aset', 'merek_id');
    }
}
