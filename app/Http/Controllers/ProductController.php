<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Polyfill\Ctype\Ctype;

class ProductController extends Controller
{
    public function index()
    {
        // $categories = Product::paginate(7);
        $categories = Product::latest()->paginate(7);

        return view('admin.product.index', ['product' => $categories]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', ['category' => $categories]);
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required'
        ]);

        $categories = Category::findOrFail($request->category_id);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->slug = Str::slug($request->name);
        $product->category_id = $categories->id;

        $categories->products()->save($product);
        // $categories->products()->create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'slug' => Str::slug($request->name),
        // ]);

        // Redirect to the category index page
        return redirect()->route('product.index')->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $id = decrypt($id);

        $category = Product::find($id);
        if (!$category) {
            abort(404);
        }
        return view('admin.product.edit', ['product' => $category]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',

        ]);
        $id = $request->category_id;
        $model = new Product();
        $data = $model->getSingleWithId($id);

        if (!empty($data)) {
            $data->name = $request->name;
            $data->price = $request->price;
            $data->slug = Str::slug($request->name);
            $data->save();
            return redirect()->route('product.index')->with('success', 'Category updated successfully');
        }
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $category = Product::find($id);
        if (!$category) {
            abort(404);
        }
        $category->delete();
        return redirect()->route('product.index')->with('success', 'Category deleted successfully');
    }
}
