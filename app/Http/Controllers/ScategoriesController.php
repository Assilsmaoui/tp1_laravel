<?php

namespace App\Http\Controllers;

use App\Models\scategories;
use Illuminate\Http\Request;

class ScategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
$scategorie=Scategories::with("categorie")->get();
return response()->json($scategorie);#pour faire la jointure 
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try { 
            $scategorie=new Scategories([ 
                "nomscategorie"=>$request->input("nomscategorie"), 
                "imagescategorie"=>$request->input("imagescategorie"), 
                "categorieID"=>$request->input("categorieID") 
 
            ]); 
            $scategorie->save(); 
            return response()->json($scategorie); 
        } catch (\Exception $e) { 
            return response()->json("insertion impossible {$e->getMessage()}"); 
         } 

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $scategorie=scategories::with('categorie')->findOrFail($id);
            return response()->json($scategorie);
            } catch (\Exception $e) {
            return response()->json("Sélection impossible {$e->getMessage()}");
            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    try {
    $scategorie=scategories::findorFail($id);
    $scategorie->update($request->all());
    return response()->json($scategorie);
    } catch (\Exception $e) {
    return response()->json("Modification impossible {$e->getMessage()}");
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    try {
    $scategorie=Scategories::findOrFail($id);
    $scategorie->delete();
    return response()->json("Sous catégorie supprimée avec succes");
    } catch (\Exception $e) {
    return response()->json("Suppression impossible {$e->getMessage()}");
    }
    }
}
