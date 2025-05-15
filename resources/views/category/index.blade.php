<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Index Category Page") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                <div class="mb-4">
                    <x-create-button href="{{ route('category.create') }}" />
                </div>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Title</th>
                            <th class="px-6 py-3">Todo</th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td class="px-6 py-4 text-white">
                                    <a href="{{ route('category.edit', $category) }}" class="hover:underline text-sm">
                                        {{ $category->title }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-white">
                                    {{ $category->todos_count ?? $category->todos->count() }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('category.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button type="submit" class="text-xs text-red-600 hover:underline">
                                            Delete
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    No data available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if (session('success'))
                    <div class="mt-4 text-sm text-green-600 dark:text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('danger'))
                    <div class="mt-4 text-sm text-red-600 dark:text-red-400">
                        {{ session('danger') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
