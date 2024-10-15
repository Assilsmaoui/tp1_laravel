<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    Protected $fillable=[
        "nomcategorie",
        "imagecategorie"
    ];
    public function scategories(){
        return $this->hasMany(scategories::class,"categorieID");
    }
}
