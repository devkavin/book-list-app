<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between mb-4">
            <div class="text-left">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Edit Book Category') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" method="POST"
                    action="{{ route('book-category.update', $book_category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                required autofocus value="{{ $book_category->name }}" />
                            <x-input-error :messages="$errors->first('name')" />
                        </div>
                    </div>
                    <div class="mt-4 text-right">
                        <x-secondary-button>
                            <a href="{{ route('book-category.index') }}">Cancel</a>
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
