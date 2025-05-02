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
    <div class=""bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div>
                    <x-create-button href="{{ route( 'todo.create') }} " />
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray400">
                        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700
                        dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Title</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    @forelse ($todos as $data)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bggray-800 border-b dark:border-gray-700 border-gray-200">
                                <td scope="row" class="px-6 py-4 font-medium text-white dark:text-gray900">
                                    <a href="{{ route('todo.edit', $data) }}"
                                        class="hover:underline text-xs">{{ $data->title }}</a>

                                </td>
                                <td class="px-6 py-4 md:block">
                                    @if ($data->is_done == false)
                                    <span class="inline-flex items-center bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                                        On Going
                                    </span>
                                        @elseif ($data->is_done == true)
                                    <span class="inline-flex items-center bg-green-100 text-green-800 textsm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                                        Done
                                    </span>
                                 @endif
                                </td>   
                            </tr>
                        @empty
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bggray-800 border-b dark:border-gray-700 border-gray-200">
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:textgray-400">
                                No data available
                            </td>             
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>       
    </div>
    <div class="overflow-hidden be-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div text-x1 text-gray-900>
            <div class="flex items-center justify-between" >
                <div>
                    @if (session('success'))
                    <p x-data="{ show: true}" x-show="show" x-transition
                        x-init="setTimeout(() => show =false, 5000"
                        class="text-sm text-green-600 dark-text-green-400">{{ session('success') }}
                    </p>                    
                    @endif
                    @if (session('danger'))
                    <p x-data="{ show: true}" x-show="show" x-transition
                        x-init="setTimeout(() => show =false, 5000"
                        class="text-sm text-red-600 dark-text-red-400">{{ session('danger') }}                   
                    @endif
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto">     
        </div>

        @isset($todo)
        <div class="flex space-x-3">
                @if ($data->is_done == false)
                <td class="px-6 py-4">
                    <form action="{{ route('todo.complete', $data) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="text-xs text-white bg-green-700 hover:bg-green-800 focus:ring-4 
                            focus:outline-none focus:ring-green-300 font-medium rounded-lg px-2.5 
                            py-1.5 text-center dark:bg-green-600 dark:hover:bg-green-700 
                            dark:focus:ring-green-800">
                            Done
                        </button>
                    </form>
                </td>
            @else
                <td class="px-6 py-4">
                    <form action="{{ route('todo.uncomplete', $data) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="text-xs text-white bg-red-700 hover:bg-red-800 focus:ring-4 
                            focus:outline-none focus:ring-red-300 font-medium rounded-lg px-2.5 
                            py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 
                            dark:focus:ring-red-800">
                            Uncomplete
                        </button>
                    </form>
                </td>
            @endif
            @if($todo->is_complete == false)
            <form action="{{ route('todo.complete',$todo) }}" method="Post">
                @csrf
                @method('PATCH')
                <button type="submit" class="text-green-600 dark:text-green-400">
                    Complete

                </button>
            </form>
            @else
            <form action="{{ route('todo.uncomplete', $todo) }}" method="Post">
            @csrf
                @method('PATCH')
                <button type="submit" class="text-blue-600 dark:text-blue-400">
                    Uncomplete

                </button>
            </form>
            @endif
            @endisset
        </div>
</x-app-layout>