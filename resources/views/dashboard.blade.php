<x-app-layout>
    @php
    $pasties = auth()->user()->pasties;
    @endphp

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-indigo-100 via-purple-200 to-pink-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Profile Section (Profile Picture and Bio) -->
            <div class="bg-white rounded-lg shadow-xl p-6 mb-8">
                <div class="flex items-center space-x-6">
                    <!-- Profile Picture -->
                    <div class="bg-gray-800 rounded-full p-1">
                        <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y'}}"
                            alt="Profile Picture" class="w-32 h-32 rounded-full object-cover">
                    </div>
                    <!-- Name and Bio -->
                    <div>
                        <h1 class="text-3xl font-semibold text-gray-900">{{ auth()->user()->name }}</h1>
                        <p class="text-lg text-gray-600">&#64;{{ auth()->user()->username }}</p>
                        <p class="text-gray-700 mt-4">{{ auth()->user()->bio ?? 'No bio available' }}</p>
                    </div>
                </div>
            </div>

            <!-- Pasties Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($pasties as $pasty)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $pasty->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($pasty->details, 100) }}</p>
                        <p class="text-gray-500 text-sm">{{ $pasty->created_at->diffForHumans() }}</p>
                    </div>

                    <div class="bg-indigo-100 p-4 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- Edit Button -->
                            @can('edit.pasty', $pasty)
                            <a href="{{ route('pasties.edit', $pasty->slug) }}" class="text-blue-600 hover:text-blue-800 font-medium transform hover:scale-105 transition-all duration-200">
                                Edit
                            </a>
                            @endcan

                            <!-- Delete Button -->
                            @can('delete.pasty', $pasty)
                            <form action="{{ route('pasties.destroy', $pasty->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="text-red-600 hover:text-red-800 font-medium transform hover:scale-105 transition-all duration-200">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            @endcan
                        </div>
                        <!-- View Details Button -->
                        <a href="{{ route('pasties.show', $pasty->slug) }}" class="mt-4 block bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">
                            View Details →
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center">
                    <p class="text-gray-500">You don't have any pasties yet. Start sharing your notes now!</p>
                    <a href="{{ route('pasties.create') }}" class="mt-4 inline-block bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 transition-all duration-300">
                        Create a Pasty
                    </a>
                </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>