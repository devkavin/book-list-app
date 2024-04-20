<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReturnRequest;
use App\Models\Borrow;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function return(ReturnRequest $request)
    {
        dd($request);
        $borrowId = $request->validated()['borrow_id'];

        $borrow = Borrow::find($borrowId);

        if (!$borrow) {
            return response()->json(['error' => 'Invalid borrow record'], 400);
        }

        if ($borrow->returned_at !== null) {
            return response()->json(['error' => 'Book already returned'], 400);
        }

        $borrow->returned_at = now();
        $borrow->book->increment('stock'); // Increment book stock

        if ($borrow->save()) {
            return response()->json(['message' => 'Book returned successfully']);
        } else {
            return response()->json(['error' => 'Failed to return book'], 500);
        }
    }
}
