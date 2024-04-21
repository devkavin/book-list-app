<x-app-layout>
    <x-slot name="header">


        <div class="flex items-center justify-between mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Book Categories') }}
            </h2>
            {{-- add book category --}}
            @if (Auth::user()->role == 'admin')
                <x-primary-button>
                    <a href="{{ route('book-category.create') }}">Add Book Category</a>
                </x-primary-button>
            @endif
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
                                <th class="px-3 py-3">Name</th>
                                <th class="px-3 py-3 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($book_categories as $book_category)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th class="px-3 py-2">{{ $book_category->id }}</th>
                                    <td class="px-3 py-2 text-nowrap text-white hover:underline">
                                        <a
                                            href="{{ route('book.index', ['book_category_id' => $book_category->id]) }}">{{ $book_category->name }}</a>
                                    </td>
                                    <td class="px-0 py-2 text-center text-nowrap">
                                        @if (Auth::user()->role == 'user')
                                            <x-secondary-button>
                                                <a
                                                    href="{{ route('book.index', ['book_category_id' => $book_category->id]) }}">Filter</a>
                                            </x-secondary-button>
                                        @elseif (Auth::user()->role == 'admin')
                                            <x-secondary-button>
                                                <a href="{{ route('book-category.edit', $book_category->id) }}">Edit</a>
                                            </x-secondary-button>
                                            <form action="{{ route('book-category.destroy', $book_category->id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>
                                                    Delete
                                                </x-danger-button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- pagination --}}
                    <div class="mt-4">
                        {{ $book_categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
