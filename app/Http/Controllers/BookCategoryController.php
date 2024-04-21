<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Http\Requests\StoreBookCategoryRequest;
use App\Http\Requests\UpdateBookCategoryRequest;
use App\Http\Resources\BookCategoryResource;
use Illuminate\Support\Facades\Auth;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = BookCategory::query();

        $sortField = request("sort_field", 'id');
        $sortDirection = request("sort_direction", 'desc');

        $book_categories = $query->orderBy($sortField, $sortDirection)
            ->paginate(10)
            ->onEachSide(1);

        return view('book-category.index', [
            'book_categories' => BookCategoryResource::collection($book_categories),
            'queryParams' => request()->query() ?: null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role == 'admin') {
            return view('book-category.create');
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookCategoryRequest $request)
    {
        try {
            $data = $request->validated();
            BookCategory::create($data);

            return redirect()->route('book-category.index')->withSuccess('Book category stored successfully.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred while storing the book category. error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BookCategory $bookCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCategory $bookCategory)
    {
        if (Auth::user()->role == 'admin') {
            return view('book-category.edit')->with([
                'book_category' => new BookCategoryResource($bookCategory),
            ]);
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookCategoryRequest $request, BookCategory $bookCategory)
    {
        try {
            $data = $request->validated();
            $bookCategory->update($data);

            return redirect()->route('book-category.index')->withSuccess('Book category updated successfully.');
        } catch (\Exception $e) {
            // Handle the error here
            return back()->withError('An error occurred while updating the book category. error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCategory $bookCategory)
    {
        if (Auth::user()->role == 'admin') {
            $name = $bookCategory->name;
            $bookCategory->delete();

            return redirect()->route('book-category.index')->withSuccess("Book category $name deleted successfully.");
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
