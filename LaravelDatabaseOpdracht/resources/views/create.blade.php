<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>maak bericht</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-4">
    @auth
    <div class="max-w-4xl mx-auto">
        <div class="bg-white p-4 rounded mb-4 shadow">
            <h1 class="text-2xl font-bold mb-2">maak bericht</h1>
        </div>
        
        <div class="bg-white p-4 rounded shadow">
            <form action="/create" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-bold mb-2">titel</label>
                    <input type="text" name="title" required
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-bold mb-2">het bericht</label>
                    <textarea name="body"  required rows="6"
                              class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500"></textarea>
                </div>
                
                <div class="flex gap-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">maak bericht</button>
                    <a href="/home" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">terug</a>
                </div>
            </form>
        </div>
    </div>
    @else
        <script>
            window.location.href = '/login';
        </script>
    @endauth
</body>
</html>