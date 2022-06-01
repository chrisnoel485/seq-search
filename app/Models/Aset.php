<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'letak_id',
        'merek_id',
        'kategori_id',
        'jenis_id',
        'status_id',
    ];
    public function merek()
        {
            return $this->belongsTo('App\Models\Merek', 'merek_id');
        }
    public function kategori()
        {
            return $this->belongsTo('App\Models\Kategori', 'kategori_id');
        }
    public function jenis()
        {
            return $this->belongsTo('App\Models\Jenis', 'jenis_id');
        }
    public function status()
        {
            return $this->belongsTo('App\Models\Status', 'status_id');
        }
    public function letak()
        {
            //return $this->belongsToMany(Letak::class);
            //return $this->belongsToMany('App\Models\Letak', 'letak_id');
            return $this->belongsTo('App\Models\Letak', 'letak_id');
        }
    //public function asetposisi()
    //    {
    //        return $this->belongsToMany('App\Models\Letak');
    //    }
}
