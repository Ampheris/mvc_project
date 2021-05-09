<?php


namespace Ampheris\ampController;


use App\Http\Controllers\Controller;


use App\Models\Book;

class Books extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books', ['books' => $books]);
    }
}
