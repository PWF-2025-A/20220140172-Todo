<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Index Todo Page") }}
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
            <div class="mb-4">
                <x-create-button href="{{ route('todo.create') }}" />
            </div>

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($todos as $todo)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="px-6 py-4 text-white">
                                <a href="{{ route('todo.edit', $todo) }}" class="hover:underline text-sm">{{ $todo->title }}</a>
                            </td>
                            <td class="px-6 py-4">
                                @if (!$todo->is_done)
                                    <span class="inline-flex bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        Ongoing
                                    </span>
                                @else
                                    <span class="inline-flex bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        Completed
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                @if (!$todo->is_done)
                                    <form action="{{ route('todo.complete', $todo) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-xs text-green-600 dark:text-green-400 hover:underline">
                                            Complete
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('todo.uncomplete', $todo) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-xs text-blue-600 dark:text-blue-400 hover:underline">
                                            Uncomplete
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('todo.destroy', $todo) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-red-600 dark:text-red-400 hover:underline">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if ($todosCompleted > 0)
                <div class="mt-6">
                    <form action="{{ route('todo.deleteallcompleted') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-primary-button>
                            Delete All Completed Task
                        </x-primary-button>
                    </form>
                </div>
            @endif

            {{-- Flash Messages --}}
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
</x-app-layout>
