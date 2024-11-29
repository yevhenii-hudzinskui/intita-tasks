@use('App\Models\Task')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @can ('create', Task::class)
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                        <label>Name
                            <input type="text" name="name">
                        </label>
                        <label>Description
                            <input type="text" name="description">
                        </label>
                        <button type="submit">Save</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
