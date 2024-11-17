<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Books fetched successfully',
            'data' => $books
        ], 200);
    }

    public function create(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'price' => 'required|numeric',
                'author' => 'required|exists:authors,id',
                'category' => 'required|exists:categories,id',
                'description' => 'nullable|string',
            ]);
    
            $book = new Book;
            $book->title = $request->get('title');
            $book->price = $request->get('price');
            $book->author_id = $request->get('author');
            $book->category_id = $request->get('category');
            $book->description = $request->get('description');
            $book->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Book added successfully!',
                'book' => $book,
            ], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add book.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $book = Book::findOrFail($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Book found for editing.',
                'data' => $book
            ], 200); 

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found.',
                'error' => $e->getMessage(),
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $book = Book::findOrFail($id);

            $validatedData = $request->validate([
                'title' => 'nullable|string|max:255',
                'price' => 'nullable|numeric',
                'author' => 'nullable|exists:authors,id',
                'category' => 'nullable|exists:categories,id',
                'description' => 'nullable|string',
            ]);

            $book->title = $request->get('title', $book->title);
            $book->price = $request->get('price', $book->price);
            $book->author_id = $request->get('author', $book->author_id);
            $book->category_id = $request->get('category', $book->category_id);
            $book->description = $request->get('description', $book->description);
            $book->save();

            return response()->json([
                'success' => true,
                'message' => 'Book updated successfully!',
                'book' => $book,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update book.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->status = 2;
            $book->save();

            return response()->json([
                'success' => true,
                'message' => 'Book deleted successfully!',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update book status.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
