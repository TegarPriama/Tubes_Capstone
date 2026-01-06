<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Tani</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-50 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-green-700">Smart Tani Greenhouse</h1>
            <p class="text-gray-500 text-sm">Silakan login untuk masuk sistem</p>
        </div>

        @error('email')
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm text-center">
            {{ $message }}
        </div>
        @enderror

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>
            <button type="submit"
                class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition">
                Masuk
            </button>
        </form>
    </div>

</body>

</html>
