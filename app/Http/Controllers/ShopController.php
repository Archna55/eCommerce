<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::orderBy('name', 'ASC')->get();
        $f_brands = $request->query('brands', '');
        $categories = Category::orderBy('name', 'ASC')->get();
        $f_categories = $request->query('categories', '');
        $brandsArray = array_filter(array_map('trim', explode(',', $f_brands)));
        $categoriesArray = array_filter(array_map('trim', explode(',', $f_categories)));

        $query = Product::query();
        if (count($brandsArray) > 0) {
            $query->whereIn('brand_id', $brandsArray);
        }
        if (count($categoriesArray) > 0) {
            $query->whereIn('category_id', $categoriesArray);
        }
        if ($request->has('range')) {
        // Split the string "50-100" into an array [50, 100]
        $parts = explode('-', $request->range);
        
        $min = $parts[0];
        $max = $parts[1];

        if ($max === 'above') {
            // Handle the "Over $1000" case
            $query->where('sale_price', '>=', $min);
        } else {
            // Handle standard ranges using whereBetween
            $query->whereBetween('sale_price', [$min, $max]);
        }
    }

        $products = $query->orderBy('created_at', 'DESC')->paginate(12);

        return view('shop', compact('products', 'brands', 'f_brands', 'categories', 'f_categories'));
    }

    public function product_details($product_slug) {
        $product = Product::where('slug', $product_slug)->first();
        return view('details', compact('product'));
    }
}
