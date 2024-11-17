<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::whereIn('status', [0, 1])->with('author')->orderby('created_at', 'DESC')->get();
        return view(
            'books',
            [
                'books' => $books
            ]
        );
    }
}
