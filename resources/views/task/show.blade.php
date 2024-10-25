<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>ID: {{ $task->getKey() }}</p>
                <p>User name: {{ $user->name }}</p>
                <p>Name: {{ $task->name }}</p>
                <p>Description: {{ $task->description }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
