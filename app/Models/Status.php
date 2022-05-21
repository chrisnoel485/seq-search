<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
    ];
    public function aset()
    {
        return $this->hasMany('App\Models\Aset', 'status_id');
    }
}
