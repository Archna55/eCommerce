<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
// use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Laravel\Facades\Image;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function brands () {
        $brands = Brand::orderBy('id', 'ASC')->paginate(10);
        return view('admin.brands', compact('brands'));
    }
    public function add_brand () {
        return view('admin.brand-add');
    }
    public function brand_store (Request $request) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug',
            'image' => 'mimes:jpeg,png,jpg|max:2048',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = str::slug($request->name);
        $image = $request->file('image');
        $file_extension = $request->file('image')->extension();
        $file_name = Carbon::now()->timestamp . '.' . $file_extension;
        $this->GenerateBrandThumbailsImage($image, $file_name);
        $brand->image = $file_name;
        $brand->save();
        return redirect()->route('admin.brands')->with('status', 'Brand added successfully.');
    }

    public function brand_edit ($id) {
        $brand = Brand::find($id);
        return view('admin.brand-edit', compact('brand'));
    }
    public function brand_update (Request $request) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,'. $request->id ,
            'image' => 'mimes:jpeg,png,jpg|max:2048',
        ]);
        $brand = Brand::find($request->id);
        $brand->name = $request->name;
        $brand->slug = str::slug($request->name);
        if ($request->hasFile('image')) {
            if (File::exists(public_path('images/brands/' . $brand->image))) {
                File::delete(public_path('images/brands/' . $brand->image));
            }
            $image = $request->file('image');
            $file_extension = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extension;
            $this->GenerateBrandThumbailsImage($image, $file_name);
            $brand->image = $file_name;
        }
        $brand->save();
        return redirect()->route('admin.brands')->with('status', 'Brand has been updated successfully!');
    }
    public function GenerateBrandThumbailsImage ($image, $imageName) {
        $destinationPath = public_path('/images/brands');
        $img = Image::read($image->path());
        $img->cover(124, 124, "top");
        $img->resize(124, 124)->save($destinationPath. '/' .$imageName);
    }

    public function brand_delete ($id) {
        $brand = Brand::find($id);
        if (File::exists(public_path('images/brands'. '/' . $brand->image))) {
            File::delete(public_path('images/brands'. '/' . $brand->image));
        }
        $brand->delete();
        return redirect()->route('admin.brands')->with('status', 'Brand has been deleted successfully!');
    }

    public function categories () {
        $categories = Category::orderBy('id', 'ASC')->paginate(10);
        return view('admin.categories', compact('categories'));
    }

    public function add_category () {
        return view('admin.category-add');
    }

    public function category_store (Request $request) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:jpeg,png,jpg|max:2048',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = str::slug($request->name);
        $image = $request->file('image');
        $file_extension = $request->file('image')->extension();
        $file_name = Carbon::now()->timestamp . '.' . $file_extension;
        $this->GenerateCategoryThumbailsImage($image, $file_name);
        $category->image = $file_name;
        $category->save();
        return redirect()->route('admin.categories')->with('status', 'Category added successfully.');
    }
    public function GenerateCategoryThumbailsImage ($image, $imageName) {
        $destinationPath = public_path('/images/categories');
        $img = Image::read($image->path());
        $img->cover(124, 124, "top");
        $img->resize(124, 124)->save($destinationPath. '/' .$imageName);
    }

    public function category_edit ($id) {
        $category = Category::find($id);
        return view('admin.category-edit', compact('category'));
    }

    public function category_update (Request $request) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'. $request->id ,
            'image' => 'mimes:jpeg,png,jpg|max:2048',
        ]);
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug = str::slug($request->name);
        if ($request->hasFile('image')) {
            if (File::exists(public_path('images/categories/' . $category->image))) {
                File::delete(public_path('images/categories/' . $category->image));
            }
            $image = $request->file('image');
            $file_extension = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extension;
            $this->GenerateCategoryThumbailsImage($image, $file_name);
            $category->image = $file_name;
        }
        $category->save();
        return redirect()->route('admin.categories')->with('status', 'Category has been updated successfully!');
    }
    public function category_delete ($id) {
        $category = Category::find($id);
        if (File::exists(public_path('images/categories'. '/' . $category->image))) {
            File::delete(public_path('images/categories'. '/' . $category->image));
        }
        $category->delete();
        return redirect()->route('admin.categories')->with('status', 'Category has been deleted successfully!');
    }

    public function products () {
        $products = Product::orderBy('id', 'ASC')->paginate(10);
        return view('admin.product', compact('products'));
    }

    public function product_add () {
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        $brands = Brand::select('id', 'name')->orderBy('name')->get();
        return view('admin.product-add', compact('categories', 'brands'));
    }

    public function product_store (Request $request) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'SKU' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
            'brand_id' => 'required',
            'featured' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = str::slug($request->name);
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->SKU = $request->SKU;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->featured = $request->featured;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $current_timestemp = Carbon::now()->timestamp;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $current_timestemp . '.' . $image->extension();
            $this->GenerateProductThumbailsImage($image, $imageName);
            $product->image = $imageName;

        }
        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;
        if ($request->hasFile('images')) {
            $allowedFileExtention = ['jpeg', 'png', 'jpg'];
            $files =$request->file('images');
            foreach ($files as $file) {
                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension, $allowedFileExtention);
                if ($gcheck) {
                    $gfileName = $current_timestemp . "-" . $counter . '.' . $gextension;
                    $this->GenerateProductThumbailsImage($file, $gfileName);
                    array_push($gallery_arr, $gfileName);
                    $counter = $counter++;
                }
            }
            $gallery_images = implode(",", $gallery_arr);
        }
        $product->images = $gallery_images;
        $product->save();
        return redirect()->route('admin.products')->with('status', 'Product added successfully.');

    }
    public function GenerateProductThumbailsImage ($image, $imageName) {
        $destinationPathThumbnail = public_path('/images/products/thumbnails');
        $destinationPath = public_path('/images/products');
        $img = Image::read($image->path());
        $img->cover(540, 689, "top");
        $img->resize(540, 689)->save($destinationPath. '/' .$imageName);
        $img->resize(104, 104)->save($destinationPathThumbnail. '/' .$imageName);
    }

    public function product_edit ($id) {
        $product = Product::find($id);
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        $brands = Brand::select('id', 'name')->orderBy('name')->get();
        return view('admin.product-edit', compact('product', 'categories', 'brands'));
    }

    public function product_update (Request $request) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug,'. $request->id ,
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'SKU' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
            'brand_id' => 'required',
            'featured' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,png,jpg|max:2048',
        ]);
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->slug = str::slug($request->name);
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->SKU = $request->SKU;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->featured = $request->featured;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        
        $current_timestemp = Carbon::now()->timestamp;
        if ($request->hasFile('image')) {
            if (File::exists(public_path('images/products/' . $product->image))) {
                File::delete(public_path('images/products/' . $product->image));
            }
            if (File::exists(public_path('images/products/thumbnails/' . $product->image))) {
                File::delete(public_path('images/products/thumbnails/' . $product->image));
            }
            $image = $request->file('image');
            $imageName = $current_timestemp . '.' . $image->extension();
            $this->GenerateProductThumbailsImage($image, $imageName);
            $product->image = $imageName;

        }
        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;
        if ($request->hasFile('gallery')) {
            foreach (explode(',', $product->images) as $imge) {
                if (File::exists(public_path('images/products/' . $imge))) {
                    File::delete(public_path('images/products/' . $imge));
                }
                if (File::exists(public_path('images/products/thumbnails/' . $imge))) {
                    File::delete(public_path('images/products/thumbnails/' . $imge));
                }
            }
            $allowedFileExtention = ['jpeg', 'png', 'jpg'];
            $files =$request->file('images');
            foreach ($files as $file) {
                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension, $allowedFileExtention);
                if ($gcheck) {
                    $gfileName = $current_timestemp . "-" . $counter . '.' . $gextension;
                    $this->GenerateProductThumbailsImage($file, $gfileName);
                    array_push($gallery_arr, $gfileName);
                    $counter++;
                }
            }
            $gallery_images = implode(",", $gallery_arr);
        }
        $product->images = $gallery_images;
        $product->save();
        return redirect()->route('admin.products')->with('status', 'Product has been updated successfully!');
    }

    public function product_delete ($id) {
        $product  = Product::find(($id));
        if (File::exists(public_path('images/products/' . $product->image))) {
            File::delete(public_path('images/products/' . $product->image));
        }
        if (File::exists(public_path('images/products/thumbnails/' . $product->image))) {
            File::delete(public_path('images/products/thumbnails/' . $product->image));
        }
        foreach (explode(',', $product->images) as $imge) {
            if (File::exists(public_path('images/products/' . $imge))) {
                File::delete(public_path('images/products/' . $imge));
            }
            if (File::exists(public_path('images/products/thumbnails/' . $imge))) {
                File::delete(public_path('images/products/thumbnails/' . $imge));
            }
        }
        $product->delete();
        return redirect()->route('admin.products')->with('status', 'Product has been deleted successfully!');
    }
}