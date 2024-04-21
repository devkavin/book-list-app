<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="bg-red-100 border-l-4 border-red-200 text-red-700 p-4 mb-4" role="alert">
                    {{ session('error') }}
                </div>
            @elseif (session('warning'))
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
                    {{ session('warning') }}
                </div>
            @endif
        </div>
    </div>
</nav>
