<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-auto">


                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b-2 border-gray-500">
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Author</th>
                                    <th class="px-4 py-2">Stock</th>

                                    <th class="px-4 py-2">Category</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td class="border px-4 py-2 text-center">{{ $book->id }}</td>
                                        <td class="border px-4 py-2">{{ $book->title }}</td>
                                        <td class="border px-4 py-2">{{ $book->author }}</td>
                                        <td class="border px-4 py-2">{{ $book->stock }}</td>
                                        {{-- get book_category_id and display the id from book_categories --}}
                                        <td class="border px-4 py-2">{{ $book->book_category_id }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('book.edit', $book->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                            <form action="{{ route('book.destroy', $book->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
