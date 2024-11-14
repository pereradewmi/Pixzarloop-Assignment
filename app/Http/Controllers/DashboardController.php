<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;


class DashboardController extends Controller
{
    public function all (){
        $booksCount = Book::whereIn('status',[0,1])-> count();
        $categoriesCount = Category::where('status', 1)-> count();
        $authorsCount = Author::where('status', 1)-> count();

        return view('backend.dashboard',compact('booksCount','categoriesCount','authorsCount'));
    }
}
