<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowRequest;
use App\Models\Book;
use App\Models\Borrow;

class BorrowController extends Controller
{

    public function index()
    {
        // for all borrows
        $query = Borrow::query();

        $sortField = request("sort_field", 'id');
        $sortDirection = request("sort_direction", 'desc');

        $user_id = request("user_id"); // Get the user ID from the request
        if ($user_id) {
            $query->where('user_id', $user_id); // Filter by user ID if provided
        }

        $borrows = $query->orderBy($sortField, $sortDirection)
            ->paginate(10)
            ->onEachSide(1);

        return view('borrow.index', [
            'borrows' => $borrows,
            'queryParams' => request()->query() ?: null,
        ]);
    }

    public function borrow(BorrowRequest $request)
    {
        $user_id = $request->validated()['user_id'];
        $book_id = $request->validated()['book_id'];

        $book = Book::find($book_id);

        if (!$book || $book->stock <= 0) {
            return back()->with('error', 'Book not available!');
        }

        $borrow = Borrow::create([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'borrowed_at' => now(),
        ]);

        $book->decrement('stock'); // Decrement book stock
        $book->save();

        // return to the same page with success message
        return back()->with('success', 'Book borrowed successfully!');

        // return response()->json(['success' => 'Book borrowed successfully!', 'borrow' => $borrow], 201);

    }
}
