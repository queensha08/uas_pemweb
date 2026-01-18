<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporans'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['id_detaildokumentasi', 'namakegiatan','tanggalkegiatan', 'link', 'keterangan',];

    public function DetailDokumentasi(){
        return $this->belongsTo(DetailDokumentasi::class, 'id_detaildokumentasi','id');
    }
}
