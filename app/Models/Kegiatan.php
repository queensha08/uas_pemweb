<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'namakegiatan',
        'id_jeniskegiatan',
        'tanggalkegiatan',
        'kategoripeserta',
    ];

    public function Kegiatan(){
        return $this->hasMany(Kegiatan::class, 'id_kegiatan','id');
    }

    public function Jeniskegiatan(){
        return $this->belongsTo(Jeniskegiatan::class, 'id_jeniskegiatan','id');
    }

    /**
     * Check if the user has any of the given roles.
     *
     * @param array $roles
     * @return bool
     */
    
    /**
     * Get the roles associated with the user.
     */
    
}
