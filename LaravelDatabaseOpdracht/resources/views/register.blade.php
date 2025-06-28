<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-md mx-auto mt-8">
        <div class="bg-white p-6 rounded shadow">
            <h1 class="text-2xl font-bold mb-4">account aanmaken</h1>
            <p class="text-gray-600 mb-4">of <a href="/login" class="text-blue-500 hover:text-blue-600">login</a></p>
            
            <form action="/register" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-bold mb-2">gebruikersnaam</label>
                    <input type="text" name="name" placeholder="gebruikersnaam"
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-bold mb-2">e-mail</label>
                    <input type="email" name="email" placeholder="e-mail"
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-bold mb-2">wachtwoord</label>
                    <input type="password" name="password" placeholder="wachtwoord"
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                </div>
                
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">account aanmaken</button>
            </form>
        </div>
    </div>
</body>
</html>