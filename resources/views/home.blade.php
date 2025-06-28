<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-4">    
    @auth
    <div class="max-w-4xl mx-auto">
        <div class="bg-white p-4 rounded mb-4 shadow">
            <h1 class="text-2xl font-bold mb-2">welkom {{ auth()->user()->name }}</h1>
            <div class="flex gap-4">
                <a href="/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">maak nieuw bericht</a>
                <a href="/myPost" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">mijn account</a>
            </div>
        </div>

        <h2 class="text-xl font-bold mb-4">alle berichten</h2>

        <div class="space-y-4">
            @foreach($posts as $post)
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">{{$post['title']}}</h3>
                <p class="text-gray-700 mb-2">{{$post['body']}}</p>
                <p class="text-sm text-gray-500">bericht van {{$post->user->name}}</p>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <script>
        window.location.href = '/login';
    </script>
    @endauth
</body>
</html>