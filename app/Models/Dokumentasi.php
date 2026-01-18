<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kegiatan',
        'link',
        'photo',
    ];

    protected $casts = [
        'photos' => 'array', // inisialisasi photos sebagai array
    ];

    // Tambahkan metode accessor untuk mengambil URL foto
    public function getPhotoUrlAttribute()
    {
        return asset('uploads/' . $this->photo);
    }

    public function Dokumentasi(){
        return $this->hasMany(Dokumentasi::class, 'id_dokumentasi','id');
    }

    public function Kegiatan(){
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan','id');
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
