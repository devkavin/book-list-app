<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between mb-4">
            <div class="text-left">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __($book->title) . ' by ' . $book->author }}
                </h2>
            </div>
            <div class="text-right">
                <x-borrow-form-button :book="$book" :can_borrow="$can_borrow" />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- <pre>
                        {{ JSON_encode($book, JSON_PRETTY_PRINT) }}
                    </pre> --}}

                    <div class="grid gap-1 grid-cols-2">
                        <div>
                            <div>
                                <label class="font-bold text-lg">Book ID</label>
                                <p class="mt-1">{{ $book->id }}</p>
                            </div>
                            <div class="mt-4">
                                <label class="font-bold text-lg">Title</label>
                                <p class="mt-1">{{ $book->title }}</p>
                            </div>
                            <div class="mt-4">
                                <label class="font-bold text-lg">Author</label>
                                <p class="mt-1">{{ $book->author }}</p>
                            </div>
                            <div class="mt-4">
                                <label class="font-bold text-lg">Category</label>
                                <p class="mt-1">{{ $book->category->name }}</p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <label class="font-bold text-lg">Price</label>
                                <p class="mt-1">{{ $book->price }}</p>
                            </div>
                            <div class="mt-4">
                                <label class="font-bold text-lg">Stock</label>
                                <p class="mt-1">{{ $book->stock }}</p>
                            </div>
                            <div class="mt-4">
                                <label class="font-bold text-lg">Total Borrowed</label>
                                <p class="mt-1">{{ $total_borrowed }}</p>
                            </div>
                            <div class="mt-4">
                                <label class="font-bold text-lg">Pending Returns</label>
                                <p class="mt-1">{{ $pending_returns }}</p>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <!-- Additional details or actions eg. edit, delete, etc -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
