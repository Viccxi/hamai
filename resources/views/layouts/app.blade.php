<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HAMAI - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #121212;
            color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background: #1f1f1f;
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: #f1f1f1;
            text-decoration: none;
            margin-right: 12px;
        }

        .navbar strong {
            color: #ff6f61;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 0 16px;
        }

        .card {
            background: #1f1f1f;
            padding: 16px;
            border-radius: 10px;
            margin-bottom: 16px;
        }

        .btn {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary {
            background: #ff6f61;
            color: #fff;
        }

        .btn-secondary {
            background: #333;
            color: #f1f1f1;
        }

        .btn-danger {
            background: #c0392b;
            color: #fff;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 10px;
            border-radius: 6px;
            border: 1px solid #333;
            background: #121212;
            color: #f1f1f1;
        }

        label {
            font-size: 14px;
        }

        .alert {
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .alert-success {
            background: #145a32;
            color: #ecf0f1;
        }

        .alert-error {
            background: #922b21;
            color: #ecf0f1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            padding: 8px 6px;
            border-bottom: 1px solid #333;
        }

        th {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="{{ route('ai-projects.index') }}"><strong>HAMAI</strong></a>
        </div>
        <div>
            <a href="{{ route('ai-projects.index') }}">AI Projects</a>
            <a href="{{ route('ai-projects.create') }}">+ New AI Project</a>
        </div>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
