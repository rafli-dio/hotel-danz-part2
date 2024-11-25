<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Tamu Hotel Danz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-lg w-full m-4">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Registrasi Tamu Hotel<span class="text-blue-700 font-bold">Danz</span></h1>
        <form action="{{ route('save-tamu') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="nama_panjang" class="block text-sm font-medium text-gray-700">Nama Panjang</label>
                <input 
                    type="text" 
                    name="nama_panjang" 
                    id="nama_panjang" 
                    value="{{ old('nama_panjang') }}" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
                @error('nama_panjang')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input 
                    type="text" 
                    name="alamat" 
                    id="alamat" 
                    value="{{ old('alamat') }}" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
                @error('alamat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input 
                    type="number" 
                    name="nomor_telepon" 
                    id="nomor_telepon" 
                    value="{{ old('nomor_telepon') }}" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
                @error('nomor_telepon')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
                <span 
                    class="absolute inset-y-0 right-4 flex items-center cursor-pointer top-[20px]" 
                    onclick="togglePassword('password', this)">
                    <svg id="icon-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3c-5 0-9 3.58-9 7 0 3.42 4 7 9 7s9-3.58 9-7c0-3.42-4-7-9-7zm0 12c-3.33 0-6.22-2.02-7.45-4 1.23-1.98 4.12-4 7.45-4s6.22 2.02 7.45 4c-1.23 1.98-4.12 4-7.45 4zm0-6a2 2 0 110 4 2 2 0 010-4z" />
                    </svg>
                </span>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
                <span 
                    class="absolute inset-y-0 right-4 flex items-center cursor-pointer top-[20px]" 
                    onclick="togglePassword('password_confirmation', this)">
                    <svg id="icon-password_confirmation" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 3c-5 0-9 3.58-9 7 0 3.42 4 7 9 7s9-3.58 9-7c0-3.42-4-7-9-7zm0 12c-3.33 0-6.22-2.02-7.45-4 1.23-1.98 4.12-4 7.45-4s6.22 2.02 7.45 4c-1.23 1.98-4.12 4-7.45 4zm0-6a2 2 0 110 4 2 2 0 010-4z" />
                    </svg>
                </span>
</div>

            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                Register
            </button>
        </form>
    </div>
</body>
<script>
    function togglePassword(fieldId, iconElement) {
        const input = document.getElementById(fieldId);
        const icon = iconElement.querySelector('svg');
        if (input.type === 'password') {
            input.type = 'text';
            icon.innerHTML = `
                <path d="M10 3c-5 0-9 3.58-9 7 0 3.42 4 7 9 7s9-3.58 9-7c0-3.42-4-7-9-7zm0 12c-3.33 0-6.22-2.02-7.45-4 1.23-1.98 4.12-4 7.45-4s6.22 2.02 7.45 4c-1.23 1.98-4.12 4-7.45 4z" />
            `;
        } else {
            input.type = 'password';
            icon.innerHTML = `
                <path d="M10 3c-5 0-9 3.58-9 7 0 3.42 4 7 9 7s9-3.58 9-7c0-3.42-4-7-9-7zm0 12c-3.33 0-6.22-2.02-7.45-4 1.23-1.98 4.12-4 7.45-4s6.22 2.02 7.45 4c-1.23 1.98-4.12 4-7.45 4zm0-6a2 2 0 110 4 2 2 0 010-4z" />
            `;
        }
    }
</script>
</html>
