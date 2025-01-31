<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;

    protected $fillable = ['id_enqueteur', 'date_collecte', 'is_collecte'];

    // Relation avec la catégorie
    public function categorie()
    {
        return $this->belongsTo(Enqueteur::class, 'id_enqueteur');
    }
}
