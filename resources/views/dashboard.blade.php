<x-app-layout>
    <x-slot name="header">

        <div class="flex items-center justify-between mb-4">
            <div class="text-left">

                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            {{-- add user --}}
            <div class="text-right">

                <x-primary-button>
                    <a href="{{ route('book.index') }}">Borrow A Book</a>
                </x-primary-button>
                <x-danger-button>
                    <a href="{{ route('user.show', Auth::user()->id) }}">Return A Book</a>
                </x-danger-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
