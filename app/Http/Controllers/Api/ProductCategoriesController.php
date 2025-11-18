<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoriesController extends Controller
{

    public function index()
    {
        $productCategories = ProductCategory::all();
        return response()->json($productCategories);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);
        $productCategory = ProductCategory::create( $validatedData);
        return response()->json($productCategory, 201);
    }
    public function show($id)
    {
        $category = ProductCategory::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = ProductCategory::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $category->update($validatedData);

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ], 201);
    }
}
