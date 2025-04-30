<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return \App\Models\Book::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //r
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'isbn' => 'required|string|max:13',
        ]);

        $book = new Book();
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->publication_date = $request->input('publication_date');
        $book->isbn = $request->input('isbn');
        $book->genre = $request->input('genre');
        $book->description = $request->input('description');
        $book->user_id = 1; // Assuming you have user authentication
        $book->save();

        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Book $book)
    {
        //
        return $book;
    }
    //


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
            'publication_date' => 'sometimes|required|date',
            'isbn' => 'sometimes|required|string|max:13',
        ]);


        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->publication_date = $request->input('publication_date');
        $book->isbn = $request->input('isbn');
        $book->genre = $request->input('genre');
        $book->description = $request->input('description');

        $book->update();
        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return response()->json(null, 204);
    }
}