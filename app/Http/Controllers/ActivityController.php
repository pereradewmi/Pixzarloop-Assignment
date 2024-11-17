<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Book;
use App\Models\Member;

class ActivityController extends Controller
{
    public function all (){
        $all_books = Activity::where('status', 1)->whereIn('book_status', [1, 2])->with('member','book')->orderby('created_at', 'ASC')->get();
        return view('backend.activities.all-books', ['all_books' => $all_books]);
    }

    public function borrowView (){
        $books = Activity::where('book_status',1)->where('status', 1)->with('member','book')->orderby('created_at', 'ASC')->get();
        return view('backend.activities.borrow-books', ['books' => $books]);
    }

    public function handoverView (){
        $books = Activity::where('book_status',2)->orderby('created_at', 'ASC')->get();
        return view('backend.activities.handover-books', ['books' => $books]);
    }

    public function changeBorrowStatus($id, $book_status){
        $obj = Activity::where('id', $id)->update([
            'book_status' => 2
        ]);

        return redirect()->back()->with('success', 'Book Record Added !!!');
    }

    public function status($id, $book_status){
        $obj = Activity::where('id', $id)->update([
            'status' => 0
        ]);

        return redirect()->back()->with('success', 'Book Record Added !!!');
    }

    public function deleteBorrow($id)
    {
        $obj = Activity::where('id', $id)->update([
            'status' => 2
        ]);

        return redirect()->back()->with('success', 'Borrow Book deleted successfully !!!');
    }
    public function delete($id)
    {
        $obj = Activity::where('id', $id)->update([
            'status' => 2
        ]);

        return redirect()->back()->with('success', 'Book deleted successfully !!!');
    }
}
