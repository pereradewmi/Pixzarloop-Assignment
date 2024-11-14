<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class AuthorController extends Controller
{
    
    public function index()
    {
        $authors = Author::whereIn('status', [0, 1])->orderby('created_at', 'ASC')->get();
        return view('backend.authors.index', ['authors' => $authors]);
    }

    public function add()
    {
        return view('backend.authors.add');
    }

    public function create(Request $request)
    {
        $author = new Author;
        $author->name = $request->get('name');
        $author->save();
        
        return redirect()->route('authors')->with('success', 'Author added sucessfully !!!');
    }

    // public function edit($id)
    // {
    //     $book = Author::with()->find($id);
    //     $data = (Object) array();
    //     $data->author = Author::where('status', 1)->get();
    //     return view('backend.authors.edit',['author' => $author, 'data' => $data]);
    // }
    public function edit($id)
    {
        $author = Author::find($id);
        return view('backend.authors.edit',['author' => $author]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $model = Author::where('id', $request->get('id'))->update(
            [
            'name' => $request->get('name'),
            ]
        );

        return redirect()->back()->with('success', 'Author updated successfully !!! ');
    }


    public function delete($id)
    {
        $obj = Author::where('id', $id)->update([
            'status' => 2
        ]);

        return redirect()->back()->with('success', 'Author deleted successfully !!!');
    }


    public function status($id, $status)
    {
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        $obj = Author::where('id', $id)->update([
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Author Status updated successfully !!!');
    }
}
