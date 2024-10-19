<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md bg-white p-8 border border-gray-200 rounded-lg shadow-md">
            <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800">Sign In</h1>

            @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-4 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('message'))
            <div class="bg-green-100 text-green-600 p-4 rounded mb-6">
                {{ session('message') }}
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password:</label>
                    <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition duration-300 ease-in-out font-medium">Sign In</button>
            </form>

            <p class="mt-6 text-center text-gray-700">
                Don't have an account? <a href="{{ route('register.view') }}" class="text-blue-600 hover:underline">Register here</a>
            </p>
        </div>
    </div>
</body>

</html>