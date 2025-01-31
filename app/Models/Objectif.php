<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objectif extends Model
{
    use HasFactory;

    protected $fillable = ['id_enqueteur', 'id_type_ouvrage', 'date', 'objectif'];

    public function enqueteur()
    {
        return $this->belongsTo(Enqueteur::class, 'id_enqueteur');
    }

    public function ouvrage()
    {
        return $this->belongsTo(TypeOuvrage::class, 'id_type_ouvrage');
    }
}
