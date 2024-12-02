<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pasty: ') }} {{ $pasty->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Code Details</h3>

                    <!-- Code Snippet Section -->
                    <pre id="code-snippet" class="bg-gray-100 p-4 rounded-md text-sm text-gray-700 cursor-pointer select-text">
                        <code>{{ $pasty->details }}</code>
                    </pre>

                    <!-- Success Message -->
                    <p id="copy-feedback" class="text-green-500 mt-2 hidden">Copied to clipboard!</p>
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