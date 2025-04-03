{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO App</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
         .welcome-container { text-align: center; padding: 50px 0; }
         .btn-primary { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1 class="mb-4">Welcome to the TODO App!</h1>
        <p class="lead">This quick setup will help you get started.</p>
        <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-lg">Let's Go</a>
    </div>
</body>
</html>