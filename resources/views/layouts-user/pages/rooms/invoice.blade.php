<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden mt-10">
        <!-- Header Section -->
        <div class="bg-gray-800 text-white text-center py-6">
            <div class="text-3xl font-semibold">Hotel <span class="text-blue-700 font-bold">Danz</span></div>
        </div>
        <!-- Invoice Content -->
        <div class="p-6">
            <p class="text-gray-800 text-lg font-semibold">Hi {{ $reservasi->tamu->nama_panjang }},</p>
            <p class="text-gray-600 mt-2">
                Kamu memesan kamar <span class="font-semibold">{{ $reservasi->kamar->nomor_kamar }} ({{ $reservasi->kamar->tipeKamar->nama_tipe_kamar }})</span> tunjukan bukti booking ini kepada resepsionis kami.
                Rinciannya adalah sebagai berikut:
            </p>
            <!-- Booking Details -->
            <div class="mt-6 bg-gray-50 p-4 rounded-lg shadow-sm">
                <div class="text-sm text-gray-600 flex justify-between">
                    <span>Tanggal Check-In</span>
                    <span>{{ $reservasi->tanggal_check_in }}</span>
                </div>
                <div class="text-sm text-gray-600 flex justify-between mt-1">
                    <span>Tanggal Check-Out</span>
                    <span>{{ $reservasi->tanggal_check_out }}</span>
                </div>
                <div class="text-sm text-gray-600 flex justify-between mt-1">
                    <span>Kota</span>
                    <span>{{ $reservasi->kota }}</span>
                </div>
                <div class="text-sm text-gray-600 flex justify-between mt-1">
                    <span>Jumlah Tamu</span>
                    <span>{{ $reservasi->jumlah_orang }}</span>
                </div>
            </div>
            <!-- Table -->
            <table class="w-full mt-6 text-sm text-left border-collapse">
                <thead class="text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="pb-2">Deskripsi</th>
                        <th class="text-right pb-2">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    <tr class="border-t">
                        <td class="py-2">
                        Pemesanan Kamar ({{ $reservasi->kamar->tipeKamar->nama_tipe_kamar }}) <br>
                            <span class="text-gray-500 text-xs">{{ $reservasi->kamar->nomor_kamar }}</span>
                        </td>
                        <td class="py-2 text-right">Rp. {{ number_format($reservasi->total_harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="border-t">
                        <td class="py-2">Subtotal</td>
                        <td class="py-2 text-right">Rp. {{ number_format($reservasi->total_harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="border-t">
                        <td class="py-2 font-semibold">Total Pembayaran</td>
                        <td class="py-2 text-right font-semibold">Rp. {{ number_format($reservasi->total_harga, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center mt-6 mx-auto flex flex-col items-center">
                <h2 class="text-lg font-bold mb-4">Kode Booking</h2>
                <div class="">{!! $barcode !!}</div>
            </div>
            <div class="text-center mt-6">
                <button onclick="window.print()" 
                        class="bg-blue-500 text-white font-semibold py-2 px-6 rounded hover:bg-blue-600">
                    Donwload Bukti Pemesanan
                </button>
            </div>
            <!-- Kembali ke Home Button -->
            <div class="text-center mt-4">
                <a href="{{route('get-home-tamu')}}" 
                   class="bg-green-500 text-white font-semibold py-2 px-6 rounded hover:bg-gray-600">
                    Kembali ke Home
                </a>
            </div>
        </div>
    </div>
</body>
</html>
