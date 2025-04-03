{{-- resources/views/tasks/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Tasks</h2>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create a new Task</a>
            <form method="GET" action="{{ route('tasks.index') }}" class="form-inline">
                <label for="filter" class="mr-2">Filter by Status:</label>
                <select name="filter" id="filter" class="form-control mr-2">
                    <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>All</option>
                    <option value="active" {{ request('filter') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="completed" {{ request('filter') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                <button type="submit" class="btn btn-secondary">Filter</button>
            </form>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Record Status</th> <!-- Added column for active/inactive -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->completed ? 'Completed' : 'Incomplete' }}</td>
                        <td>{{ $task->trashed() ? 'Inactive' : 'Active' }}</td> <!-- Show active/inactive -->
                        <td>
                            @if (!$task->trashed()) <!-- Only allow editing and deleting if not trashed -->
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('tasks.delete', $task) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @else
                                <span class="text-muted">Deleted</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
