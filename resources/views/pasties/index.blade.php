<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-600 via-purple-700 to-pink-600 text-white py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-bold leading-tight mb-6 animate__animated animate__fadeIn">
                All Your Pasties in One Place
            </h1>
            <p class="text-xl font-light mb-8 animate__animated animate__fadeIn animate__delay-1s">
                Browse, edit, or share your code snippets with ease. Organize them, and keep them accessible for everyone.
            </p>
            @auth
            <a href="{{ route('pasties.create') }}" class="bg-indigo-700 text-white text-lg font-semibold py-3 px-8 rounded-lg hover:bg-indigo-800 transition ease-in-out duration-300 transform hover:scale-105">
                Create New Pasty
            </a>
            @endauth
        </div>
    </section>
    <!-- Pasties Grid Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                <!-- Loop Through Pasties -->
                @foreach($pasties as $pasty)
                <div class="bg-white shadow-xl rounded-lg p-6 transition-transform transform hover:scale-105 hover:shadow-2xl hover:bg-indigo-50 duration-300">
                    <div class="mb-4">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $pasty->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($pasty->details, 100) }}</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between">
                        @can('edit.pasty', $pasty)
                        <a href="{{ route('pasties.edit', $pasty->slug) }}" class="text-blue-500 hover:text-blue-700 transition-colors duration-300">
                            Edit
                        </a>
                        @endcan

                        @can('delete.pasty', $pasty)
                        <form action="{{ route('pasties.destroy', $pasty) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors duration-300">
                                Delete
                            </button>
                        </form>
                        @endcan
                    </div>

                    <!-- Read More Button -->
                    <div class="mt-4 text-center">
                        <a href="{{ route('pasties.show', $pasty->slug) }}" class="bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">
                            Read More →
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Pagination -->
    <div class="mt-10 text-center">
        {{ $pasties->links() }}
    </div>
</x-app-layout>