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

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
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
</html>
