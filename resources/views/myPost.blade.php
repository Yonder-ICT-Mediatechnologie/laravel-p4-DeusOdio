<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mijn berichten</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-4">
    @auth
    <div class="max-w-4xl mx-auto">
        <div class="bg-white p-4 rounded mb-4 shadow">
            <h1 class="text-2xl font-bold mb-2">Mijn Account</h1>
            <a href="/home" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">← terug naar Home</a>
        </div>
        
        <div class="bg-white p-4 rounded mb-4 shadow">
            <h2 class="text-xl font-bold mb-4">account informatie</h2>
            <p class="mb-2"><strong>gebruikersnaam:</strong> {{ auth()->user()->name }}</p>
            <p class="mb-4"><strong>e-mail:</strong> {{ auth()->user()->email }}</p>
            <div class="flex gap-4">
                <form action="/editAccount" method="GET">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">verander account</button>
                </form>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">logout</button>
                </form>
            </div>
        </div>
        
        <h2 class="text-xl font-bold mb-4">mijn berichten</h2>
        
        @if($posts->count() > 0)
            <div class="space-y-4">
                @foreach($posts as $post)
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-semibold mb-2">{{$post->title}}</h3>
                    <p class="text-gray-700 mb-2">{{$post->body}}</p>
                    <p class="text-sm text-gray-500 mb-4">bericht van{{$post->user->name}}</p>
                    <div class="flex gap-2">
                        <form action="/edit/{{$post->id}}" method="GET">
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">verander</button>
                        </form>
                        <form action="/delete/{{$post->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('weet je zeker dat je dit bericht wilt verwijderen?')" 
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">verwijder</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white p-6 rounded shadow text-center">
                <p class="text-gray-600 mb-4">geen bericht.</p>
                <a href="/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">maak een bericht</a>
            </div>
        @endif
    </div>
    @else
        <script>
            window.location.href = '/login';
        </script>
    @endauth
</body>
</html>
