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
        $data->stock_no = 'HB-' . ((Book::orderBy('created_at', 'desc')->first()->id ?? 0) + 1);
        $data->author = MasterAuthor::where('status', 1)->get();
        $data->category = MasterCategory::where('status', 1)->get();

        return view('backend.books..add', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $book = new Book;
        $book->title = $request->get('title');
        $book->price = $request->get('price');
        $book->category_id = $request->get('category');
        $book->description = $request->get('description');
        $book->save();

        $bookAuthors = new BookAuthor;
        $bookAuthors->book_id = $book->id;
        $bookAuthors->author_id = $request->get('author');
        $bookAuthors->save();
        
        return redirect()->route('backend.books..add')->with('success', 'Book added sucessfully !!!');
    }

    public function edit($id)
    {
        $book = Book::with('bookImage', 'bookAuthor')->find($id);
        $data = (Object) array();
        $data->author = MasterAuthor::where('status', 1)->get();
        $data->category = MasterCategory::where('status', 1)->get();

        return view('backend.books..edit', ['book' => $book, 'data' => $data]);
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
                'description' => $request->get('description'),
            ]
        );

        $model = BookAuthor::where('book_id', $request->get('id'))->update(
            [
                'author_id' => $request->get('author'),
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
