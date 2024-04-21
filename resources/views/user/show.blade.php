<x-app-layout>
    <x-slot name="header">

        <div class="flex items-center justify-between mb-4">
            <div class="text-left">

                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('User Details') }}
                </h2>

            </div>
            <div class="text-right">
                <x-primary-button>
                    <a href="{{ route('borrow.index', ['user_id' => $user->id]) }}">View Borrowed Books</a>
                </x-primary-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- <pre>
                        {{ JSON_encode($user, JSON_PRETTY_PRINT) }}
                    </pre> --}}

                    <div class="grid gap-1 grid-cols-2">
                        <div>
                            <div>
                                <label class="font-bold text-lg">User ID</label>
                                <p class="mt-1">{{ $user->id }}</p>
                            </div>
                            <div class="mt-4">
                                <label class="font-bold text-lg">User Name</label>
                                <p class="mt-1">{{ $user->name }}</p>
                            </div>
                            <div class="mt-4">
                                <label class="font-bold text-lg">User Email</label>
                                <p class="mt-1">{{ $user->email }}</p>
                            </div>
                            <div class="mt-4">
                                <label class="font-bold text-lg">Access Level</label>
                                <p class="mt-1">{{ $user->role }}</p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <label class="font-bold text-lg">Total Borrows</label>
                                <p class="mt-1">{{ $user->borrowedBooks->count() }}</p>
                            </div>
                            <div class="mt-4">
                                <label class="font-bold text-lg">Pending Returns</label>
                                <p class="mt-1">{{ $user->borrowedBooks->where('returned_at', null)->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
