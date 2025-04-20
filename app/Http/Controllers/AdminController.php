<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    //
    public function view_category() {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request) {
        $data = new Category;

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category Added Success');
    }

    public function delete_category($id) {
        // Validate CSRF token, prevents deletion if user manually types the route of this function
        if (request('token') !== csrf_token()) {
            abort(403, 'Unauthorized action.');
        }
        //
        
        $data = Category::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    // Product
    public function view_product() {
        $data = Category::all();

        return view('admin.product', compact('data'));
    }

    public function add_product(Request $request) {
        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $product->image = $imagename;

        $product->save();

        $request->image->move('product', $imagename);
        
        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function show_product() {
        $data = Product::all();

        return view('admin.show_product', compact('data'));
    }

    public function delete_product($id) {
        // Validate CSRF token, prevents deletion if user manually types the route of this function
        if (request('token') !== csrf_token()) {
            abort(403, 'Unauthorized action.');
        }
        //
        
        $data = Product::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function update_product($id) {
        $product = Product::find($id);

        $category = Category::all();

        return view('admin.update_product', compact('product', 'category'));
    }

    public function update_product_info(Request $request, $id) {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        
        
        $image = $request->image;
        if($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $product->image = $imagename;
        }
        
        $product->save();

        if($image) {
            $request->image->move('product', $imagename);
        }

        if ($product->title == $request->title &&
        $product->description == $request->description &&
        $product->price == $request->price &&
        $product->discount_price == $request->dis_price &&
        $product->quantity == $request->quantity &&
        $product->category == $request->category && !$request->image) { 
            $message = "No changes";  
        } else {
            $message = "Product Updated Successfully"; 
        }

        return redirect()->back()->with('message', $message);
    }
}
