<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('Pasty: ') }} {{ $pasty->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- User Header Section (Profile PFP, Name, and Handle) -->
                    <div class="flex items-center mb-6 space-x-4">
                        <!-- Profile Picture -->
                        <div class="bg-gray-800 rounded-full p-1">
                            <img src="{{ $pasty->user->profile_picture ? asset('storage/' . $pasty->user->profile_picture) : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y'}}" alt="Profile Picture" class="w-12 h-12 rounded-full object-cover">
                        </div>

                        <!-- User Info -->
                        <div>
                            <!-- Display Name (links to user profile) -->
                            <a href="{{ route('users.show', $pasty->user->username) }}" class="text-2xl font-semibold text-gray-800 hover:text-blue-600">
                                {{ $pasty->user->name }}
                            </a>
                            <!-- User Handle -->
                            <p class="text-sm text-gray-500">&#64;{{ $pasty->user->username }}</p>
                        </div>
                    </div>

                    <!-- Code Snippet Section -->
                    <div class="relative">
                        <pre id="code-snippet" class="bg-gray-100 p-6 rounded-md text-sm text-gray-700 cursor-pointer select-text shadow-md">
                            <code>{{ $pasty->details }}</code>
                        </pre>
                        <p id="copy-feedback" class="text-green-500 mt-2 hidden">Copied to clipboard!</p>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-6">
                        <a href="{{ route('pasties.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Back to Pasties
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const codeSnippet = document.getElementById('code-snippet');
            const feedback = document.getElementById('copy-feedback');

            codeSnippet.addEventListener('dblclick', function() {
                const range = document.createRange();
                const selection = window.getSelection();
                range.selectNodeContents(codeSnippet);
                selection.removeAllRanges();
                selection.addRange(range);

                try {
                    // Try to copy the selected content to the clipboard
                    document.execCommand('copy');
                    feedback.classList.remove('hidden'); // Show feedback
                    setTimeout(() => feedback.classList.add('hidden'), 2000); // Hide feedback after 2 seconds
                } catch (err) {
                    console.error('Failed to copy text: ', err);
                }
            });
        });
    </script>
</x-app-layout>