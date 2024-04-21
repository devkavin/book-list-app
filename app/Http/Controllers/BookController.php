<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookCategoryResource;
use App\Http\Resources\BookResource;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        $categories = BookCategory::all();

        $sortField = request("sort_field", 'id');
        $sortDirection = request("sort_direction", 'desc');

        if (request("title")) {
            $query->where("title", "like", "%" . request("title") . "%");
        }
        if (request("stock")) {
            $query->where("stock", request("stock"));
        }
        if (request("price")) {
            $query->where("price", request("price"));
        }
        if (request("book_category_id")) {
            $query->where("book_category_id", request("book_category_id"));
        } else {
            $query = $query->with('category');
        }

        $books = $query->orderBy($sortField, $sortDirection)
            ->paginate(10)
            ->onEachSide(1);

        return view('book.index', [
            'books' => BookResource::collection($books),
            'categories' => BookCategoryResource::collection($categories),
            'queryParams' => request()->query() ?: null,
            // 'can_borrow' => BookResource::collection($books)->where('stock', '<=', 0) ? true : false,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role == 'admin') {
            return view('book.create')->with([
                'categories' => BookCategory::all()
            ]);
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        try {
            $data = $request->validated();
            Book::create($data);

            return redirect()->route('book.index')->withSuccess('Book stored successfully.');
        } catch (\Exception $e) {
            // Handle the error here
            return back()->withError('An error occurred while storing the book. error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $total_borrowed = $book->borrows->count();
        $pending_returns = $book->borrows->where('returned_at', null)->count();

        $can_borrow = $book->stock == 0 ? false : true;
        return view('book.show')->with([
            'book' => new BookResource($book),
            'total_borrowed' => $total_borrowed,
            'pending_returns' => $pending_returns,
            'can_borrow' => $can_borrow,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        if (Auth::user()->role == 'admin') {
            return view('book.edit')->with([
                'book' => $book,
                'categories' => BookCategory::all()
            ]);
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        try {
            $data = $request->validated();
            $book->update($data);

            return redirect()->route('book.index')->withSuccess('Book updated successfully.');
        } catch (\Exception $e) {
            // Handle the error here
            return back()->withError('An error occurred while updating the book. error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (Auth::user()->role == 'admin') {
            $title = $book->title;
            $author = $book->author;
            $book->delete();

            return redirect()->route('book.index')->withSuccess('Book ' . $title . ' by ' . $author . ' deleted successfully.');
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
