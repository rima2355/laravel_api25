<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use PhpParser\Node\Stmt\TryCatch;

class ProductCategoriesController extends Controller
{

    public function index() 
    {
        $productCategories = ProductCategory::with('products','variants')->get();
        return response()->json([
            'data' =>$productCategories],
             200);
       
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
    $category = ProductCategory::find($id);

    if (!$category) {
        return response()->json([
            'message' => 'Data tidak ditemukan'
        ], 404);
    }

    return response()->json($category, 200);
}


    public function update(Request $request, $id)
    {
        $category = ProductCategory::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string'
            
        ]);

        $category->update($validatedData);
        

        return response()->json($category, 200);
        
    }

    public function destroy($id)
    {
        \Log::info('Delete request received for ID: ' . $id);
        
        $category = ProductCategory::find($id);
        
        if (!$category) {
            \Log::error('Category not found with ID: ' . $id);
            return response()->json([
                'message' => 'Category not found with ID: ' . $id
            ], 404);
        }
        
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ], 200);
    }
    
}
