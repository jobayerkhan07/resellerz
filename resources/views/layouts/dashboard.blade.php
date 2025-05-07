<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

<nav class="bg-white shadow mb-8">
    <div class="container mx-auto px-6 py-3">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">Resellerz Dashboard</h1>
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<main class="container mx-auto px-6">
    @yield('content')
</main>

</body>
</html>

