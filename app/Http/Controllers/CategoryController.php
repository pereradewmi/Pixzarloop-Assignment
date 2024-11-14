<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::whereIn('status', [0, 1])->orderby('created_at', 'ASC')->get();
        return view('backend.categories.index', ['categories' => $categories]);
    }

    public function add()
    {
        return view('backend.categories.add');
    }

    public function create(Request $request)
    {
        $category = new Category;
        $category->name = $request->get('name');
        $category->save();
        
        return redirect()->route('categories')->with('success', 'Category added sucessfully !!!');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.categories.edit',['category' => $category]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $model = Category::where('id', $request->get('id'))->update(
            [
            'name' => $request->get('name'),
            ]
        );

        return redirect()->back()->with('success', 'Category updated successfully !!! ');
    }


    public function delete($id)
    {
        $obj = Category::where('id', $id)->update([
            'status' => 2
        ]);

        return redirect()->back()->with('success', 'Category deleted successfully !!!');
    }


    public function status($id, $status)
    {
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        $obj = Category::where('id', $id)->update([
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Category Status updated successfully !!!');
    }
}
