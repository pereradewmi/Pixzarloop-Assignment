<?php

namespace App\Http\Controllers\API;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;  

class BookController extends Controller
{
    public function index()
    {
        // Fetch all books from the database
        $books = Book::all();
    
        // Return a standardized success response
        return response()->json([
            'status' => 'success',      // Status of the request
            'message' => 'Books fetched successfully', // A message to describe the result
            'data' => $books            // The actual data (in this case, the list of books)
        ], 200); // 200 HTTP status code for a successful request
    }

    public function create(Request $request)
    {
        try {
            // Validation (Optional but recommended)
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'price' => 'required|numeric',
                'author' => 'required|exists:authors,id',
                'category' => 'required|exists:categories,id',
                'description' => 'nullable|string',
            ]);
    
            // Create a new book record
            $book = new Book;
            $book->title = $request->get('title');
            $book->price = $request->get('price');
            $book->author_id = $request->get('author');
            $book->category_id = $request->get('category');
            $book->description = $request->get('description');
            $book->save();
    
            // Log success (optional)
            Log::info('Book added successfully.', ['book' => $book]);
    
            // Return a JSON response with the created book data
            return response()->json([
                'success' => true,
                'message' => 'Book added successfully!',
                'book' => $book,  // Include the newly created book data in the response
            ], 201); // HTTP status code 201 for resource creation
    
        } catch (\Exception $e) {
            // Log the exception details if an error occurs
            Log::error('Error adding book.', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);
    
            // Return a JSON response with an error message
            return response()->json([
                'success' => false,
                'message' => 'Failed to add book.',
                'error' => $e->getMessage(),
            ], 500); // HTTP status code 500 for internal server error
        }
    }
    
    
}
