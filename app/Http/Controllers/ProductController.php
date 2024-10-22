<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    public function show($id)
    {
        // Находим продукт по его ID
        $product = Product::findOrFail($id);
        return view('show', compact('product'));
    }
    
    public function index()
    {
        $products = Product::cursorPaginate(3);
        
        return view('Product', ['product' => $products]);
    }
}
?>