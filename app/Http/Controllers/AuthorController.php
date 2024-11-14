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

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'author' => 'required|string|max:255',
        ]);

        $author = new Author;
        $author->author = $request->get('author');
        $author->save();
        
        return redirect()->route('backend.authors.add')->with('success', 'Author added sucessfully !!!');
    }

    public function edit($id)
    {
        $author = Author::with('id')->find($id);
        $author->author = Author::where('status', 1)->get();

        return view('backend.authors.edit',['author' => $author]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'author' => 'required|string|max:255',
        ]);

        $model = Author::where('id', $request->get('id'))->update(
            [
            'author' => $request->get('author'),
            ]
        );

        $model = Author::where('book_id', $request->get('id'))->update(
            [
            'author_id' => $request->get('author'),
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
