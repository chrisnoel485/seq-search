<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    #protected $table = 'kategoris';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function letak()
    {
        return $this->hasMany('App\Models\Letak', 'kategori_id');
    }
    public function aset()
    {
        return $this->hasMany('App\Models\Aset', 'kategori_id');
    }
}
