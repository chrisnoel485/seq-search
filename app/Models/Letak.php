<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letak extends Model
{
    use HasFactory;
    //protected $guarded = [];
    protected $fillable = [
        'nama',
        'deskripsi',
        'kategori_id',
    ];

    public function kategori()
        {
            return $this->belongsTo('App\Models\Kategori', 'kategori_id');
        }
    public function aset()
        {
            return $this->hasOne('App\Models\Aset', 'letak_id');
        }
    //public function posisiaset()
    //    {
    //        return $this->belongsToMany('App\Models\Aset');
    //    }
}
