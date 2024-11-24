<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Tamu Hotel Danz</title>
</head>
<body>
    <h1>Register as a Guest</h1>
    <form action="{{ route('save-tamu') }}" method="POST">
    @csrf
    <div>
        <label for="nama_panjang">Nama Panjang:</label>
        <input type="text" name="nama_panjang" id="nama_panjang" value="{{ old('nama_panjang') }}" required>
        @error('nama_panjang')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" required>
        @error('alamat')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon') }}" required>
        @error('nomor_telepon')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        @error('password')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password_confirmation">Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>

    <button type="submit">Register</button>
</form>

</body>
</html>
