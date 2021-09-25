<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return new CategoryCollection(Category::all());
    }

    public function show($id){
        return new CategoryResource(Category::findOrFail($id));
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
}
