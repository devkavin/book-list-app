<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between mb-4">
            <div class="text-left">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Edit Book') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" method="POST"
                    action="{{ route('book.update', $book->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                required autofocus value="{{ $book->title }}" />
                            <x-input-error :messages="$errors->first('title')" />
                        </div>
                        <div>
                            <x-input-label for="author" :value="__('Author')" />
                            <x-text-input id="author" class="block mt-1 w-full" type="text" name="author"
                                required value="{{ $book->author }}" />
                            <x-input-error :messages="$errors->first('author')" />
                        </div>
                        <div>
                            <x-input-label for="book_category_id" :value="__('Book Category')" />
                            <x-select-input id="book_category_id" class="block mt-1 w-full" type="text"
                                name="book_category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($category->id == $book->book_category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->first('category')" />
                        </div>
                        <div>
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01"
                                name="price" required value="{{ $book->price }}" />
                            <x-input-error :messages="$errors->first('price')" />
                        </div>
                        <div>
                            <x-input-label for="stock" :value="__('Stock')" />
                            <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock"
                                required value="{{ $book->stock }}" />
                            <x-input-error :messages="$errors->first('stock')" />
                        </div>
                    </div>
                    <div class="mt-4 text-right">
                        <x-secondary-button>
                            <a href="{{ route('book.index') }}">Cancel</a>
                        </x-secondary-button>
                        <x-primary-button class="ml-4" type="submit">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
