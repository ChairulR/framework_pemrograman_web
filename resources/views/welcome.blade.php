<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f7fafc;
            color: #1a202c;
        }
        .container {
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to My Laravel Application</h1>
        <p>
            <?php
            $greeting = "Hello, World!";
            echo $greeting;
            ?>
        </p>    
        <p>
            <a href="contact">Contact</a>
            <a href="login">login</a>
        </p>
        <p>
            Tanggal: {{ date('Y-m-d') }}
        </p>
    </div>
</body>
</html>