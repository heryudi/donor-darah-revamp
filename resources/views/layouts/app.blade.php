<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donor Darah - Bengkel Hangtuah</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen">
        <header class="bg-red-600 text-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold">
                        Donor Darah
                    </h1>
                    <p class="text-sm italic">bengkel Hangtuah</p>
                </div>
                <!-- Navigation -->
                <nav>
                    <a href="{{ route('donors.index') }}" class="px-3 py-2 rounded hover:bg-red-700">Home</a>
                </nav>
            </div>
        </header>

        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        <footer class="bg-white border-t mt-8 py-6">
            <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-sm">
                Sistem Informasi Bengkel Hangtuah &copy; {{ date('Y') }}
            </div>
        </footer>
    </div>
</body>
</html>
