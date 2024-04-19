<x-app-layout>
    <x-slot name="header">


        <div class="flex items-center justify-between mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users') }}
            </h2>
            {{-- add user --}}
            <x-primary-button>
                <a href="{{ route('user.create') }}">Add User</a>
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <pre>
                        {{ JSON_encode($users, JSON_PRETTY_PRINT) }}
                    </pre>
                    {{-- table --}}
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs to-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b-2 border-gray-500">
                            <tr class="text-nowrap">
                                <th class="px-3 py-3">ID</th>
                                <th class="px-3 py-3">Name</th>
                                <th class="px-3 py-3">Email</th>
                                <th class="px-3 py-3">Books Borrowed</th>
                                <th class="px-3 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th class="px-3 py-2">{{ $user->id }}</th>
                                    <td class="px-3 py-2 text-nowrap text-white hover:underline">
                                        <a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a>
                                    </td>
                                    <td class="px-3 py-2 text-nowrap">{{ $user->email }}</td>
                                    <td class="px-3 py-2">{{ $user->borrowedBooks->count() }}</td>
                                    <td class="px-0 py-2 text-center text-nowrap">
                                        <x-secondary-button>
                                            <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                                        </x-secondary-button>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
