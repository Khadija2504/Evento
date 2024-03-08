<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function listCategories(){
        $categories = Categorie::orderBy('updated_at', 'desc')->paginate(15);
        return view('categories.listCategories', compact('categories'));
    }

    public function addCategoryForm(){
        return view('categories.addCategory');
    }

    public function addCategory(categoryRequest $request){
        $validated = $request->validated();
        Categorie::create($validated);
        return redirect()->back();
    }

    public function deleteCategory($id){
        $category = Categorie::where('id', $id);
        $category->delete();
        return redirect()->back();
    }

    public function editCategoryForm($id){
        $categories = Categorie::where('id', $id)->get();
        return view('categories.editCategoryForm', compact('categories'));
    }

    public function editCategory(categoryRequest $request, $id){
        $validated = $request->validated();
        $category = Categorie::where('id', $id);
        $category->update($validated);
        return redirect()->back();
    }


}
