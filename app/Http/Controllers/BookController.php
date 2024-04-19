<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookCategoryResource;
use App\Http\Resources\BookResource;
use App\Models\BookCategory;
use Illuminate\Http\Request;

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
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
