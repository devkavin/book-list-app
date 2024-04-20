<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReturnRequest;
use App\Models\Borrow;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function return(ReturnRequest $request)
    {
        $borrowId = $request->validated()['borrow_id'];

        $borrow = Borrow::find($borrowId);
        if (!$borrow) {
            return redirect()->route('borrow.index')->with('error', 'Borrow not found');
        }

        if ($borrow->returned_at !== null) {
            return redirect()->route('borrow.index')->with('error', 'Book already returned');
        }

        $borrow->returned_at = now();
        $borrow->book->increment('stock'); // Increment book stock

        if ($borrow->save()) {
            return redirect()->route('borrow.index')->with('success', 'Book returned successfully');
        } else {
            return redirect()->route('borrow.index')->with('error', 'Failed to return book');
        }
    }
}
