<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowRequest;
use App\Models\Book;
use App\Models\Borrow;

class BorrowController extends Controller
{
    public function borrow(BorrowRequest $request)
    {
        $user_id = $request->validated()['user_id'];
        $book_id = $request->validated()['book_id'];

        $book = Book::find($book_id);

        if (!$book || $book->stock <= 0) {
            return response()->json(['error' => 'Book unavailable for borrowing'], 422);
        }

        $borrow = Borrow::create([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'borrowed_at' => now(),
        ]);

        $book->decrement('stock'); // Decrement book stock
        $book->save();

        return response()->json(['message' => 'Book borrowed successfully!', 'borrow' => $borrow], 201);
    }
}
