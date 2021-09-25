<?php

namespace App\Http\Controllers;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function index(){
        return new CategoryCollection(Category::all());
    }

    public function show(Category $category){
        return new CategoryResource($category);
    }

    public function store(Request $request){
        
        $request->validate([
            'nom' => 'required',
            'obs' => 'required'
        ]);
        
        $category = Category::create([
            "nom" => $request->nom,
            "obs" => $request->obs
        ]);

        $category->save();

        return new CategoryResource($category);
    }

    public function update(Request $request, Category $category){
        $updateCategory = $category;

        $updateCategory->nom = $request->nom;
        $updateCategory->obs = $request->obs;

        if($updateCategory->isDirty()){
            $updateCategory->save();
            return new CategoryResource($updateCategory);
        }
        return response()->json(['message' => 'data already updated'], 200);
    }
}
