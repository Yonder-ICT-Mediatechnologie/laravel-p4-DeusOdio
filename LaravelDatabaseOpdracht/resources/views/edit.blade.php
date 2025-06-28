<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>wijzig bericht</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-4">
    @auth
    <div class="max-w-4xl mx-auto">
        <div class="bg-white p-4 rounded mb-4 shadow">
            <h1 class="text-2xl font-bold mb-2">wijzig bericht</h1>
            <div class="flex gap-4">
                <a href="/home" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">← terug</a>
                <a href="/myPost" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">mijn berichten</a>
            </div>
        </div>
        
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                @foreach($errors->all() as $error)
                    <p class="text-sm">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        
        <div class="bg-white p-4 rounded shadow">
            <form action="/edit/{{$post->id}}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-bold mb-2">title</label>
                    <input type="text" name="title" value="{{$post->title}}" required
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-bold mb-2">het bericht</label>
                    <textarea name="body" required rows="6"
                              class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">{{$post->body}}</textarea>
                </div>
                
                <div class="flex gap-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">verander bericht</button>
                    <a href="/myPost" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">terug</a>
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
