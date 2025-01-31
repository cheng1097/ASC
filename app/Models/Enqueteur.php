<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enqueteur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'id_controleur'];

    // Relation avec la catégorie
    public function controleur()
    {
        return $this->belongsTo(User::class, 'id_controleur');
    }

     //relation avec objectif
     public function objectifs()
     {
         return $this->hasMany(Objectif::class, 'id_enqueteur');
     }
}
