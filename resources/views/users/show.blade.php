<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-12">
        <!-- Profile Header -->
        <div class="flex items-center space-x-6 mb-8">
            <div class="bg-gray-800 rounded-full p-1">
                <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y'}}" alt="Profile Picture" class="w-32 h-32 rounded-full object-cover">
            </div>

            <div class="flex flex-col">
                <h1 class="text-3xl font-semibold text-gray-900">{{ $user->name }}</h1>
                <p class="text-lg text-gray-600">&#64;{{ $user->username }}</p>
            </div>
        </div>

        <!-- Bio Section -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800">Bio</h2>
            <p class="text-gray-700">
                {{ $user->bio ?? 'No bio available' }}
            </p>
        </div>

        <!-- Pasty List -->
        <div class="space-y-6">
            @foreach($pasties as $pasty)
            <div class="p-6 bg-white rounded-lg shadow-md">
                <!-- Pasty Title -->
                <h3 class="text-2xl font-semibold text-gray-800">{{ $pasty->title }}</h3>

                <!-- Pasty Details (with truncation) -->
                <p class="text-gray-600 mt-2 line-clamp-3">{{ $pasty->details }}</p>

                <!-- Pasty Created Time -->
                <p class="text-sm text-gray-500 mt-2">Posted {{ $pasty->created_at->diffForHumans() }}</p>

                <!-- Pasty Actions -->
                <div class="mt-4 flex items-center justify-between">
                    <div class="flex space-x-4">
                        <!-- Edit Button -->
                        @can("edit.pasty",$pasty)
                        <a href="{{ route('pasties.edit', $pasty->slug) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        @endcan
                        @can("delete.pasty",$pasty)
                        <!-- Delete Button -->
                        <form action="{{ route('pasties.destroy', $pasty->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="text-red-500 hover:text-red-700">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        @endcan
                    </div>
                    <!-- Read More Button -->
                    <a href="{{ route('pasties.show', $pasty->slug) }}" class="text-blue-500 hover:text-blue-700">Read more</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>