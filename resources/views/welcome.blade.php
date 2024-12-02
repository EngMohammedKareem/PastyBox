<x-app-layout>
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-indigo-600 via-purple-700 to-pink-600 text-white py-32 px-4 sm:px-6 lg:px-8">
        <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Background overlay -->
        <div class="max-w-7xl mx-auto text-center relative z-10">
            <h1 class="text-5xl font-bold leading-tight mb-6 animate__animated animate__fadeIn animate__delay-1s">
                Welcome to <span class="font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 via-orange-400 to-red-500">PastyBox</span>
            </h1>
            <p class="text-xl font-light mb-8 animate__animated animate__fadeIn animate__delay-2s">
                A simple, fast, and secure way to store, share, and showcase your code snippets and notes.
            </p>
            <a href="{{ route('pasties.index') }}" class="bg-indigo-700 text-white text-lg font-semibold py-3 px-8 rounded-lg hover:bg-indigo-800 transition ease-in-out duration-300 transform hover:scale-105">
                View All Pasties
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-10">
                Why Choose PastyBox?
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-12 h-12 text-indigo-600" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Quick and Simple</h3>
                    <p class="text-gray-600">Create, store, and share your notes instantly. Minimal effort, maximum results. Fast and efficient.</p>
                </div>
                <div class="bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-12 h-12 text-indigo-600" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Secure and Private</h3>
                    <p class="text-gray-600">Your notes are yours alone. PastyBox ensures top-notch privacy and security for all your data.</p>
                </div>
                <div class="bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-12 h-12 text-indigo-600" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Share with Ease</h3>
                    <p class="text-gray-600">Collaborate and share your notes effortlessly. Send a link, and you’re good to go.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Updated Footer Section -->
    <footer class="bg-gray-900 text-white py-4 mt-10">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-gray-400 text-sm">
                &copy; {{ date('Y') }} PastyBox. All rights reserved.
            </p>
        </div>
    </footer>

</x-app-layout>