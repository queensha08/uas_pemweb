<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeniskegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jeniskegiatan',
        'level',
    ];

    public function Jeniskegiatan(){
        return $this->hasMany(Jeniskegiatan::class, 'id_jeniskegiatan','id');
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
