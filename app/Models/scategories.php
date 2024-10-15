<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scategories extends Model
{
    use HasFactory;
    protected $fillable = [
        "nomscategorie","imagescategorie","categorieID"
    ];
    public function categorie(){
        return $this->belongsTo(Categorie::class,"categorieID");
    }
    public function Article(){
        return $this->hasMany(Article::class,"scategorieID");  #hasMany 1 ou plusieur (sous categorie a plusieur article) 
    }
}
