<div class="container mx-auto px-4 lg:px-6 py-2.5 mt-[60px]  flex flex-col lg:flex-row justify-between items-center">
    <!-- description session -->
   <section class="description-jumbotron w-full lg:w-[40%] p-[60px]">
      <h1 class="text-[70px] font-bold ">Let's <br><u class=
      "decoration-orange-500">travel</u> the<br>world</h1>
      <p class="mt-6">Nikmati liburan menyenangkan dan menginap nyaman di Hotel<span class="text-blue-700 font-bold">Danz</span>.</p>
   </section>
   <!-- image session -->
   <section class="image-jumbotron w-full lg:w-[50%] p-4">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <img src="{{ asset('assets/images/gambar-hotel-2.jpg') }}" alt="Gambar Kedua" class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="row-span-2">
            <img src="{{ asset('assets/images/gambar-hotel-1.jpeg') }}" alt="Gambar Utama" class="w-full h-full object-cover rounded-lg">
            </div>
            <div>
                <img src="{{ asset('assets/images/gambar-hotel-3.jpg') }}" alt="Gambar Ketiga" class="w-full h-full object-cover rounded-lg">
            </div>
    </div>
   </section>
</div>
<!-- booking section -->
<section class="booking-jumbotron w-[80%] mx-auto bg-white rounded-full shadow-lg">
  <div class="booking p-4">
    <form class="flex flex-col lg:flex-row gap-4 items-center justify-between">
    <div class="relative w-full lg:w-[300px]">
      <i class="fas fa-map-marker-alt text-xl absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
      <select class="p-2 pl-10 border rounded-xl bg-gray-200 w-full text-gray-400">
        <option value="" class="text-gray-400" disabled selected>Pilih Lokasi</option>
        <option value="Jakarta" class="bg-white">Jakarta</option>
        <option value="Surabaya" class="bg-white">Surabaya</option>
        <option value="Bandung" class="bg-white">Bandung</option>
        <option value="Medan" class="bg-white">Medan</option>
      </select>
    </div>

    <!-- Check In Input -->
<!-- Check In Input -->
<div class="relative w-full lg:w-[300px]">
  <label for="check-in" class="absolute left-10 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none" id="check-in-label">
    Check In
  </label>
  <i class="fas fa-calendar-alt text-xl absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
  <input type="date" class="p-2 pl-10 border rounded-xl bg-gray-200 w-full" id="check-in">
  <i class="fas fa-chevron-down text-xl absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
</div>

<!-- Check Out Input -->
<div class="relative w-full lg:w-[300px]">
  <label for="check-out" class="absolute left-10 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none" id="check-out-label">
    Check Out
  </label>
  <i class="fas fa-calendar-alt text-xl absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
  <input type="date" class="p-2 pl-10 border rounded-xl bg-gray-200 w-full" id="check-out">
  <i class="fas fa-chevron-down text-xl absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
</div>

    <!-- Jumlah Orang Input yang Lebar Lebih Kecil -->
    <div class="relative w-full lg:w-[200px]">
      <i class="fas fa-users text-xl absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
      <input type="number" min="1" placeholder="Jumlah orang" class="p-2 pl-10 border rounded-xl bg-gray-200 w-full">
    </div>

    <!-- Cari Button -->
    <div class="flex items-center w-full lg:w-auto">
    <button type="submit" class="flex items-center justify-center gap-2 px-6 py-3 bg-black text-white rounded-full w-full lg:w-[200px] hover:bg-blue-700">
      <span class="flex items-center justify-center">Search</span>
      <i class="fas fa-arrow-right text-white ml-auto"></i>
    </button>
    </div>
  </form>
  </div>
</section>



