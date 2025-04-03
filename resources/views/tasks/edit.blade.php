<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>

        <?php if ($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors->all() as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description">{{ old('description', $task->description) }}</textarea>
        </div>

        <!-- Checkbox for "completed" -->
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="completed" id="completed-checkbox" value="true" {{ old('completed', $task->completed) ? 'checked' : '' }}>
            <label class="form-check-label" for="completed">Completed</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>


    </div>
</body>
</html>
