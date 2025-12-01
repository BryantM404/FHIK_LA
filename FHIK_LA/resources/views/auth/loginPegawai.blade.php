<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengajuan Surat Akademik</title>
    <!-- Memuat Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Konfigurasi Tailwind untuk warna kustom -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-orange': '#F05A1F',
                    }
                }
            }
        }
    </script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #F05A1F
        }
        input{

        }
    </style>
</head>
<body>
    
    <div class="flex items-center justify-center" style="height: calc(100vh - 0.75rem);">
        <div class="relative bg-white p-8 sm:p-10 rounded-lg shadow-2xl max-w-sm w-full mx-4">
            
            <a href="{{ route('choice') }}" class="absolute top-6 left-6 text-gray-400 hover:text-custom-orange transition duration-200 ease-in-out" aria-label="Kembali">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-gray-800 text-center tracking-wider mb-2">
                LOGIN
            </h1>
            <p class="text-xs font-medium text-gray-600 text-center mb-8 uppercase">
                APLIKASI SURAT AKADEMIK
                <br>
                FHIK - UK . MARANATHA
            </p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                
                <div>
                    <label for="id" class="block font-semibold text-xs text-gray-700 uppercase">NIK</label>
                    <input id="id" class="block mt-1 w-full h-12 px-3 py-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                           type="text" name="id" value="" required autofocus autocomplete="id"
                           placeholder="NIK">
                </div>

                <div class="mt-4">
                    <label for="password" class="block font-semibold text-xs text-gray-700">Password</label>
                    <input id="password" class="block mt-1 w-full h-12 px-3 py-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                           type="password" name="password" required autocomplete="current-password"
                           placeholder="Password">
                </div>
                @error('id')
                    <p class="text-sm text-red-600 mt-2">NIK atau Password salah</p>
                @enderror

                <input type="hidden" name="login_as" value="pegawai">

                @error('login')
                    <div class="text-sm text-red-600 mt-2">{{ $message }}</div>
                @enderror

                <div class="flex items-center justify-center mt-8">
                    <button type="submit"
                            class="inline-flex items-center justify-center w-1/2 py-2 bg-custom-orange border border-transparent rounded-md font-semibold text-sm text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-custom-orange focus:ring-offset-2 transition ease-in-out duration-150">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>