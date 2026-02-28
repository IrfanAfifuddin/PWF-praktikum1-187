<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pertemuan 2 - Laravel Breeze</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0a0a0a] flex items-center justify-center min-h-screen font-sans relative">

    @if (Route::has('login'))
        <div class="absolute top-0 right-0 p-8 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-medium text-gray-400 hover:text-white transition-colors">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-medium text-gray-400 hover:text-white transition-colors">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-6 font-medium text-gray-400 hover:text-white transition-colors">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="w-full max-w-2xl p-12 bg-[#111111] border border-[#222222] rounded-xl shadow-2xl">
        
        <div class="space-y-1 mb-6">
            <h1 class="text-white text-xl font-semibold tracking-tight">
                Irfan Afifuddin
            </h1>
            <p class="text-gray-400 text-lg">
                20230140187
            </p>
            <p class="text-gray-500 text-sm italic">
                Teknologi Informasi (S-1) - Universitas Muhammadiyah Yogyakarta
            </p>
        </div>

        <button class="bg-white text-black px-6 py-2 rounded-md font-medium hover:bg-gray-200 transition-colors">
            Modul Pertemuan 2: Breeze Auth
        </button>
        
    </div>

</body>
</html>