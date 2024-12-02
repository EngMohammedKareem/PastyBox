<x-app-layout>
    @php
    $pasties = auth()->user()->pasties;
    @endphp
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900">
                    <p class="text-lg font-semibold">{{ __("You're logged in!") }}</p>
                    <p class="mt-2 text-gray-600">Here are your pasties:</p>
                </div>
            </div>

            <!-- Pasties Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($pasties as $pasty)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $pasty->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($pasty->details, 100) }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 text-center">
                        <a href="{{ route('pasties.show', $pasty->slug) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                            View Details →
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center">
                    <p class="text-gray-500">You don't have any pasties yet. Start sharing your notes now!</p>
                </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>