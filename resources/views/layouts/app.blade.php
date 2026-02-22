<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Donor Darah - Bengkel Hangtuah</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Kiosk specific overrides */
        body {
            -webkit-user-select: none; /* Chrome/Safari */        
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* IE10+ */
            user-select: none; /* Standard */
        }
        input, select, textarea {
            -webkit-user-select: text;
            -moz-user-select: text;
            -ms-user-select: text;
            user-select: text;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-900">
    <div class="min-h-screen flex flex-col">
        <header class="bg-red-700 text-white shadow-lg">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div>
                    <h1 class="text-4xl font-extrabold tracking-tight">
                        Donor Darah
                    </h1>
                    <p class="text-lg opacity-90">Bengkel Hangtuah</p>
                </div>
                <!-- Navigation -->
                <nav>
                    <a href="{{ route('donors.index') }}" class="px-6 py-3 rounded-lg bg-red-800 hover:bg-red-900 text-xl font-bold transition">Home</a>
                </nav>
            </div>
        </header>

        <main class="flex-grow max-w-7xl mx-auto w-full py-8 text-xl">
            @yield('content')
        </main>

        <footer class="bg-white border-t py-8">
            <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-lg">
                Sistem Informasi Bengkel Hangtuah. Hak cipta dilindungi hati nurani &copy; {{ date('Y') }}
            </div>
        </footer>
    </div>
</body>
</html>
