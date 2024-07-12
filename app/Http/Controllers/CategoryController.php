<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', ['categories' => $categories]);
    }
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new category
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        // Redirect to the category index page
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $id = decrypt($id);

        $category = Category::find($id);
        if (!$category) {
            abort(404);
        }
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',

        ]);
        $id = $request->category_id;
        $model = new Category();
        $data = $model->getSingleWithId($id);

        if (!empty($data)) {
            $data->name = $request->name;
            $data->slug = Str::slug($request->name);
            $data->save();
            return redirect()->route('category.index')->with('success', 'Category updated successfully');
        }
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $category = Category::find($id);
        if (!$category) {
            abort(404);
        }
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
