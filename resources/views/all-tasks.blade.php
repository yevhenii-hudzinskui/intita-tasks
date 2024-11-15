<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All task') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="GET" action="{{ route('all-tasks') }}">
                    <input type="text" value="{{ request('search') }}" name="search">
                    <select name="sort">
                        <option value="asc" @selected(request('sort', 'asc') == 'asc')>A-Z</option>
                        <option value="desc" @selected(request('sort', 'asc') == 'desc')>Z-A</option>
                    </select>
                    <button type="submit">Search</button>
                </form>

                <a href="{{ route('all-tasks') }}">Reset</a>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>User ID</th>
                        <th>User name</th>
                        <th>User email</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->user->id }}</td>
                                <td>{{ $task->user->name }}</td>
                                <td>{{ $task->user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
