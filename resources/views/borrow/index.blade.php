<x-app-layout>
    <x-slot name="header">


        <div class="flex items-center justify-between mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Borrowed Books') }}
            </h2>
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
                                <th class="px-3 py-3">Borrow ID</th>
                                <th class="px-3 py-3">Borrowed Book Title</th>
                                <th class="px-3 py-3">Category</th>
                                <th class="px-3 py-3">Borrowed At</th>
                                <th class="px-3 py-3">Returned At</th>

                                <th class="px-3 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrows as $borrow)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th class="px-3 py-2">{{ $borrow->id }}</th>
                                    <td class="px-3 py-2 text-nowrap text-white hover:underline">
                                        <a
                                            href="{{ route('book.show', $borrow->book->id) }}">{{ $borrow->book->title }}</a>
                                    </td>
                                    <td class="px-3 py-2">{{ $borrow->book->category->name }}</td>
                                    <td class="px-3 py-2">{{ $borrow->borrowed_at }}</td>
                                    <td class="px-3 py-2">{{ $borrow->returned_at ?? 'Not returned' }}</td>
                                    <td class="px-0 py-2 text-center text-nowrap">
                                        <div class="text-nowrap">
                                            {{-- <form action="{{ route('return.book') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="borrow_id" value="{{ $borrow->id }}">
                                                @if ($borrow->returned_at)
                                                    <x-secondary-button type="submit"
                                                        disabled>Return</x-secondary-button>
                                                @else
                                                    <x-secondary-button type="submit">Return</x-secondary-button>
                                                @endif
                                            </form> --}}
                                            <x-return-form-button :borrow="$borrow" :can_return="!$borrow->returned_at" />

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- pagination --}}
                    <div class="mt-4">
                        {{ $borrows->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
