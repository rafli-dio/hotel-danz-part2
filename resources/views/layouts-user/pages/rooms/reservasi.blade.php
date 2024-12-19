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
    <style>
      input[type="date"]::-webkit-datetime-edit {
        color: black; 
      }

      input[type="date"]::-webkit-inner-spin-button {
          display: block;
      }

    </style>
</head>
<body>
@include('components-user.navbar')
<div class="container mx-auto mt-[150px] mb-[100px]">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
    <!-- Form Booking (Kiri) -->
    <div>
      <h2 class="text-2xl font-semibold mb-6">Booking {{ $tipe->nama_tipe_kamar }}</h2>
      <form action="{{ route('save-reservasi-tamu') }}" method="POST">
        @csrf
        <!-- Tamu -->
        <div class="mb-4">
          <label for="tamu_id" class="block text-sm font-medium">Nama Tamu</label>
          <input type="text" id="tamu_id" class="form-control bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-[400px] text-center" value="{{ $tamu->nama_panjang }}" readonly>
          <input type="hidden" name="tamu_id" value="{{ $tamu->id }}">
        </div>
        <!-- Jumlah Orang -->
        <div class="mb-4">
          <label for="jumlah_orang" class="block text-sm font-medium">Jumlah Orang</label>
          <select name="jumlah_orang" id="jumlah_orang" class="form-control  bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-[400px] text-center" required>
            <option value="1">1 Orang</option>
            <option value="2">2 Orang</option>
            <option value="4">4 Orang</option>
            <option value="6">6 Orang</option>
          </select>
        </div>
        <!-- Kamar -->
        <div class="mb-4">
          <label for="kamar_id" class="block text-sm font-medium">Kamar</label>
          <select name="kamar_id" id="kamar_id" class="form-control form-control bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-[400px] text-center" required>
            <option value="" disabled selected>Pilih Kamar</option>
            @foreach($kamar as $kamars)
              <option value="{{ $kamars->id }}" data-harga="{{ $kamars->tipeKamar->harga_kamar }}">{{ $kamars->nomor_kamar }}</option>
            @endforeach
          </select>
        </div>
        <!-- Kota -->
        <div class="mb-4">
          <label for="kota" class="block text-sm font-medium">Kota</label>
          <select name="kota" id="kota" class="form-control  bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-[400px] text-center" required>
            <option value="Jakarta">Jakarta</option>
            <option value="Surabaya">Surabaya</option>
            <option value="Solo">Solo</option>
            <option value="Bandung">Bandung</option>
          </select>
        </div>
        <!-- Tanggal Check-In -->
        <div class="mb-4">
          <label for="tanggal_check_in" class="block text-sm font-medium text-gray-700">Tanggal Check-In</label>
          <input 
            type="date" 
            name="tanggal_check_in" 
            id="tanggal_check_in" 
            class="form-control bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-[400px] text-center text-gray-900" 
            required>
        </div>
        <!-- Tanggal Check-Out -->
        <div class="mb-4">
          <label for="tanggal_check_out" class="block text-sm font-medium text-gray-700">Tanggal Check-Out</label>
          <input 
            type="date" 
            name="tanggal_check_out" 
            id="tanggal_check_out" 
            class="form-control bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-[400px] text-center text-gray-900" 
            required>
        </div>
        <!-- Total Harga -->
        <div class="mb-4">
          <label for="total_harga" class="block text-sm font-medium">Total Harga</label>
          <input type="text" id="total_harga" class="form-control  bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-[400px] text-center" readonly>
        </div>
        <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded w-[400px]">Booking Sekarang</button>
      </form>
    </div>
    <!-- Gambar Kamar (Kanan) -->
    <div class="relative">
      <img src="{{ asset('storage/' . $tipe->gambar_kamar) }}" alt="{{ $tipe->nama_tipe_kamar }}" class="w-full h-full object-cover rounded-lg shadow-lg">
      <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white p-4 rounded-b-lg">
        <h3 class="text-lg font-semibold">{{ $tipe->nama_tipe_kamar }}</h3>
        <p class="text-sm">{{ $tipe->deskripsi_kamar }}</p>
      </div>
    </div>
  </div>
</div>
@include('components-user.footer')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const tanggalCheckIn = document.getElementById('tanggal_check_in');
    const tanggalCheckOut = document.getElementById('tanggal_check_out');
    const kamarSelect = document.getElementById('kamar_id');
    const totalHarga = document.getElementById('total_harga');

    function calculateTotal() {
      const checkInDate = new Date(tanggalCheckIn.value);
      const checkOutDate = new Date(tanggalCheckOut.value);

      if (!isNaN(checkInDate) && !isNaN(checkOutDate) && checkOutDate > checkInDate) {
        const diffTime = Math.abs(checkOutDate - checkInDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
        const selectedOption = kamarSelect.options[kamarSelect.selectedIndex];
        const hargaKamar = parseFloat(selectedOption.getAttribute('data-harga'));

        if (!isNaN(hargaKamar)) {
          totalHarga.value = `Rp.${diffDays * hargaKamar}`;
        }
      } else {
        totalHarga.value = ''; 
      }
    }

    tanggalCheckIn.addEventListener('change', calculateTotal);
    tanggalCheckOut.addEventListener('change', calculateTotal);
    kamarSelect.addEventListener('change', calculateTotal);
  });
</script>
</body>
</html>