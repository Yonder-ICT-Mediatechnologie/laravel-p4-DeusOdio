<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>wijzig account</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-4">
    @auth
    <div class="max-w-md mx-auto">
        <div class="bg-white p-4 rounded mb-4 shadow">
            <h1 class="text-2xl font-bold mb-2">wijzig account</h1>
            <a href="/myPost" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← terug</a>
        </div>
        
        <div class="bg-white p-4 rounded mb-4 shadow">
            <h2 class="text-xl font-bold mb-4">Update Account</h2>
            <form action="/editAccount" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-bold mb-2">gebruikersnaam</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" required
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-bold mb-2">e-mail</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" required
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-bold mb-2">huidigen wachtwoord</label>
                    <input type="password" name="current_password" required
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-bold mb-2">nieuw wachtwoord</label>
                    <input type="password" name="new_password"
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-bold mb-2">nieuw wachtwoord bevestigen</label>
                    <input type="password" name="new_password_confirmation"
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update account</button>
            </form>
        </div>
        
        <div class="bg-white p-4 rounded shadow">
            <form action="/deleteAccount" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('weet je zeker dat je je account wilt verwijderen?')" 
                        class="w-full bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">verwijder Account</button>
            </form>
        </div>
    </div>
    @else
        <script>window.location.href = '/login';</script>
    @endauth
</body>
</html>