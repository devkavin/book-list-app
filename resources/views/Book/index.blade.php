<x-app-layout>
    <x-slot name="header">


        <div class="flex items-center justify-between mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Books') }}
            </h2>
            {{-- add book --}}
            <x-primary-button>
                <a href="{{ route('book.create') }}">Add Book</a>
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- table --}}
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs to-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b-2 border-gray-500">
                            <tr class="text-nowrap">
                                <th class="px-3 py-3">ID</th>
                                <th class="px-3 py-3">Title</th>
                                <th class="px-3 py-3">Author</th>
                                <th class="px-3 py-3">Category</th>
                                <th class="px-3 py-3">Price $</th>
                                <th class="px-3 py-3">Stock</th>
                                <th class="px-3 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <thead
                            class="text-xs to-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b-2 border-gray-500">
                            <tr class="text-nowrap">
                                <th class="px-3 py-3"></th>
                                <th class="px-3 py-3"></th>
                                <th class="px-3 py-3"></th>
                                <th class="px-3 py-3">
                                    <form action="{{ route('book.index') }}" method="GET">
                                        <x-select-input wire:model="book_category_id" name="book_category_id"
                                            onchange="this.form.submit()">
                                            <option value="">All Categories</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{--  if the selected category is equal to the category id, then the category is selected --}}
                                                    {{-- fix for "All categories" where the value is empty --}}
                                                    @if (request('book_category_id') == $category->id) selected @endif>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </x-select-input>
                                    </form>
                                </th>
                                <th class="px-3 py-3"></th>
                                <th class="px-3 py-3"></th>
                                <th class="px-3 py-3 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th class="px-3 py-2">{{ $book->id }}</th>
                                    <td class="px-3 py-2 text-nowrap">{{ $book->title }}</td>
                                    <td class="px-3 py-2 text-nowrap">{{ $book->author }}</td>
                                    <td class="px-3 py-2">{{ $book->category->name }}</td>
                                    <td class="px-3 py-2">{{ $book->price }}</td>
                                    <td class="px-3 py-2">{{ $book->stock }}</td>
                                    <td class="px-0 py-2 text-center text-nowrap">
                                        <x-secondary-button>
                                            <a href="{{ route('book.edit', $book->id) }}">Edit</a>
                                        </x-secondary-button>
                                        <form action="{{ route('book.destroy', $book->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>
                                                Delete
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- pagination --}}
                    <div class="mt-4">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('status-select').addEventListener('change', function(e) {
        const queryParams = new URLSearchParams(window.location.search);
        queryParams.set('status', e.target.value); // Update query param

        // Update URL without form submission
        history.replaceState({}, document.title, `${window.location.pathname}?${queryParams.toString()}`);

        // Optional: Trigger an action based on the selected value
        window.location.reload();
    });
</script>
