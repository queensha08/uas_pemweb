<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function jeniskegiatans()
    {
        return $this->belongsToMany(Jeniskegiatan::class);
    }

    public function kegiatans()
    {
        return $this->belongsToMany(Kegiatan::class);
    }

    public function dokumentasis()
    {
        return $this->belongsToMany(Dokumentasi::class);
    }

    public function detaildokumentasis()
    {
        return $this->belongsToMany(DetailDokumentasi::class);
    }
}
