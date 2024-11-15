<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class AllTasks extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $search = $request->query('search');
        $sort = $request->query('sort', 'asc');

        $tasks = Task::with('user')
            ->when($search, function ($query, $search) {
                    $query->whereHas('user', function ($query) use ($search) {
                        $query->whereAny(['name', 'email'], 'like', "%$search%");
                    })
                        ->orWhere('name', 'like', "%$search%");
            })
            ->orderBy('name', $sort)
            ->paginate(25)
            ->withQueryString();

        return view('all-tasks')
            ->with('tasks', $tasks);
    }
}
