<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::whereIn('status', [0, 1])->orderby('created_at', 'ASC')->get();
        return view('backend.books.index', ['books' => $books]);
    }

    public function add()
    {
        $data = (Object) array();
        $data->author = Author::where('status', 1)->get();
        $data->category = Category::where('status', 1)->get();

        return view('backend.books.add', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $book = new Book;
        $book->title = $request->get('title');
        $book->price = $request->get('price');
        $book->author_id = $request->get('author');
        $book->category_id = $request->get('category');
        $book->description = $request->get('description');
        $book->save();
        //@dd($book);
        
        return redirect()->route('book.add')->with('success', 'Book added sucessfully !!!');
    }

    public function edit($id)
    {
        $book = Book::with('author','category')->find($id);

        $data = (Object) array();
        $data->author = Author::where('status', 1)->get();
        $data->category = Category::where('status', 1)->get();

        return view('backend.books.edit', ['book' => $book, 'data' => $data]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $model = Book::where('id', $request->get('id'))->update(
            [
                'title' => $request->get('title'),
                'price' => $request->get('price'),
                'category_id' => $request->get('category'),
                'author_id' => $request->get('author'),
                'description' => $request->get('description'),
            ]
        );

        return redirect()->back()->with('success', 'Book updated successfully !!! ');
    }


    public function delete($id)
    {
        $obj = Book::where('id', $id)->update([
            'status' => 2
        ]);

        return redirect()->back()->with('success', 'Book deleted successfully !!!');
    }


    public function status($id, $status)
    {
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        $obj = Book::where('id', $id)->update([
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Book Status updated successfully !!!');
    }
}
