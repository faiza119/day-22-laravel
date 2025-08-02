<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::all());
    }

    public function view()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric'
        ]);

        Book::create($request->only(['title', 'author', 'year']));


        return redirect('/view-books')->with('success', 'Book added successfully!');
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return redirect('/view-books')->with('success', 'Book deleted successfully!');
    }
}
