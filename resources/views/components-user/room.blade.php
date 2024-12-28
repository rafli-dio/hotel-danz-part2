<div class="container mx-auto mt-[40px] px-4" id="rooms">
  <!-- Title Section -->
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Popular Rooms</h2>
    <div class="flex items-center gap-2">
      <button id="prev-room" class="bg-gray-200 p-2 rounded-full hover:bg-gray-300 transition">&larr;</button>
      <button id="next-room" class="bg-gray-200 p-2 rounded-full hover:bg-gray-300 transition">&rarr;</button>
    </div>
  </div>

  <!-- Card Section -->
  <div class="overflow-hidden relative">
    <div id="slider-room" class="flex gap-6 transition-transform duration-300 ease-in-out">
      @foreach($tipekamar as $tipe)
      <a href="{{ route('form-booking', $tipe->id) }}" 
         class="bg-white rounded-2xl shadow-lg overflow-hidden flex-shrink-0 w-full sm:w-[calc(100%/2)] md:w-[calc(100%/3)] lg:w-[calc(100%/4)]">
        <img src="{{ asset('storage/' . $tipe->gambar_kamar) }}" alt="{{ $tipe->nama_tipe_kamar }}" class="w-full h-[200px] object-cover">
        <div class="p-4">
          <h3 class="text-lg font-medium">{{ $tipe->nama_tipe_kamar }}</h3>
          <p class="text-gray-500">Rp. {{ number_format($tipe->harga_kamar, 0, ',', '.') }}</p>
          <div class="flex items-center mt-2">
            <span class="text-yellow-400 text-sm">★</span>
            <span class="ml-1 text-sm text-gray-600">{{ number_format(rand(45, 50) / 10, 1) }}</span>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</div>
