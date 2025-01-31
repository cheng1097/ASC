<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOuvrage extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'id_categorie'];

    // Relation avec la catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }
}
