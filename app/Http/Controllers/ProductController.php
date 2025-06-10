<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['productType', 'productMaterial.material'])->get()
            ->map(function ($product) {
                // Вычисляем стоимость
                $cost = $product->productMaterial->sum(function ($productMaterial) {
                    return $productMaterial->quantity * $productMaterial->material->price;
                });
                // Добавляем поле стоимости
                $product->cost = round($cost, 2);
                return $product;
            });

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $types = ProductType::all();
        return view('products.create', compact('types'));
    }

    public function store(ProductRequest $request) {
        $product = Product::create($request->validated());
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $types = ProductType::all();
        return view('products.edit', compact('product', 'types'));
    }

    public function update(ProductRequest $request, Product $product) {
        $product->update($request->validated());
        return redirect()->route('products.index');
    }

    public function materials(Product $product) {
        $materials = $product->productMaterial()->with('material')->get();
        $types = ProductType::all();
        return view('materials.index', compact('product', 'materials','types'));
    }
}
