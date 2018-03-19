<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        //dump($categories);
        return view('categories.index',[
            'categories' => $categories
        ]);
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(CategoriesRequest $request)
    {
        $category = new Category();
        $category -> name = $request->name;
        $category -> save();
        return redirect( route('categories.index') );
    }
    public function edit(Category $category)
    {
        //dump($category->toArray());
        //Przy rotes Route::get('/categories/{id}/edit','CategoriesController@edit')
        //$category = Category::find($id);
        //dump($category);
        //dump($category);
        return view('categories.edit', [
            'category' => $category
        ]);
    }
    public function update(CategoriesRequest $request, Category $category)
    {
        $category-> name = $request -> name;
        $category-> save();
        return redirect( route('categories.index') );
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect( route('categories.index') );
    }
}
