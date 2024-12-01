<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Danz</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>
<body class="flex min-h-screen">
    <!-- Bagian Gambar -->
    <section class="image w-1/2 bg-gray-100 flex items-center justify-center">
        <img 
            src="https://via.placeholder.com/500" 
            alt="Gambar Ilustrasi" 
            class="w-full h-auto object-cover"
        />
    </section>
    
    <!-- Bagian Form Login -->
    <section class="form-login w-1/2 flex items-center justify-center bg-white">
        <div class="w-3/4 max-w-md">
                <h1 class="self-center text-xl font-semibold whitespace-nowrap dark:text-black text-center">
                        Login Hotel<span class="text-blue-700 font-bold">Danz</span>
                </h1>
            <form action="{{route('post-login')}}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required 
                    />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required 
                    />
                </div>
                <button 
                    type="submit" 
                    class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition"
                >
                    Login
                </button>
            </form>
            <a href="{{ route('get-registrasi') }}" class="block text-center text-blue-600 mt-4">Registrasi Akun</a>
        </div>
    </section>
</body>

</html>