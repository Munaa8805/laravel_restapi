<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendeeResource;
use App\Models\Attendee;
use Illuminate\Http\Request;
use App\Models\Book;


class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Book $book)
    {
        // return $book->attendees;
        $attendees = $book->attendees()->latest();
        return AttendeeResource::collection($attendees->paginate());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        $attendee = $book->attendees()->create([
            'user_id' => 1,

        ]);
        return new AttendeeResource($attendee);
    }


    /**
     * Display the specified resource.
     */
    public function show(Book $book, Attendee  $attendee)
    {

        return new AttendeeResource($attendee);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}