<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDokumentasi extends Model
{
    use HasFactory;

    protected $table = 'detaildokumentasis';

    protected $fillable = [
        'id_user',
        'id_kegiatan',
        'id_dokumentasi',
        'tanggalkegiatan',
        'keterangan',
    ];

    public function DetailDokumentasi(){
        return $this->hasMany(DetailDokumentasi::class, 'id_detaildokumentasi','id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'id_user','id');
    }

    public function Kegiatan(){
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan','id');
    }

    public function Dokumentasi(){
        return $this->belongsTo(Dokumentasi::class, 'id_dokumentasi','id');
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
