<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Category') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-gray-800 rounded shadow mt-6">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-100 mb-2">Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full px-4 py-2 rounded text-gray-900"
                    required
                >
                @error('title')
                    <p class="text-red-500 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="px-6 py-2 bg-gray-300 text-gray-900 rounded hover:bg-gray-400">
                    Save
                </button>
                <a href="{{ route('category.index') }}" class="ml-4 text-gray-300 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
