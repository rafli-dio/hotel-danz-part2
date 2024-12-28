<div class="container mx-auto px-6 py-12 relative mt-[60px]" id="facilities">
  <!-- Description Section -->
  <div class="flex flex-col lg:flex-row justify-between items-center mb-12">
    <div class="lg:w-1/2 mb-6 lg:mb-0 p-3">
      <p class="text-lg font-medium text-gray-700">Premium Facilities</p>
      <h2 class="text-3xl lg:text-4xl font-semibold leading-tight">
        Exclusive Premium <br> Facilities
      </h2>
    </div>
    <p class="lg:w-1/2 text-gray-600 text-center lg:text-right">
      Nikmati pengalaman menginap istimewa dengan fasilitas hotel eksklusif. Rasakan kenyamanan kamar modern, layanan spa profesional, dan kolam renang yang dikelilingi keindahan alam.
    </p>
  </div>

  <!-- Facilities Cards Wrapper -->
  <div class="overflow-hidden relative">
    <div id="slider" class="flex gap-6 transition-transform duration-300 ease-in-out">
      <!-- Card 1 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden flex-shrink-0 w-full sm:w-[calc(100%/2)] md:w-[calc(100%/3)] lg:w-[calc(100%/4)]">
        <img src="{{ asset('assets/images/facilities/kolam-renang.jpg') }}" alt="Nature-Inspired Pool"
          class="w-full h-56 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2">Nature-Inspired Pool</h3>
          <p class="text-gray-600">
            Nikmati suasana alam yang menenangkan dengan kolam renang yang dikelilingi pepohonan hijau.
          </p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden flex-shrink-0 w-full sm:w-[calc(100%/2)] md:w-[calc(100%/3)] lg:w-[calc(100%/4)]">
        <img src="{{ asset('assets/images/facilities/spa.jpg') }}" alt="Spa and Wellness"
          class="w-full h-56 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2">Spa and Wellness</h3>
          <p class="text-gray-600">
            Relaksasikan diri Anda dengan layanan spa profesional yang menyegarkan tubuh dan pikiran.
          </p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden flex-shrink-0 w-full sm:w-[calc(100%/2)] md:w-[calc(100%/3)] lg:w-[calc(100%/4)]">
        <img src="{{ asset('assets/images/facilities/luxury-room.jpg') }}" alt="Luxury Rooms"
          class="w-full h-56 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2">Luxury Rooms</h3>
          <p class="text-gray-600">
            Kamar mewah dengan desain modern dan fasilitas lengkap untuk kenyamanan Anda.
          </p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden flex-shrink-0 w-full sm:w-[calc(100%/2)] md:w-[calc(100%/3)] lg:w-[calc(100%/4)]">
        <img src="{{ asset('assets/images/facilities/restaurant.jpg') }}" alt="Fine Dining Restaurant"
          class="w-full h-56 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2">Fine Dining Restaurant</h3>
          <p class="text-gray-600">
            Nikmati berbagai hidangan gourmet dari koki terbaik di restoran kami.
          </p>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden flex-shrink-0 w-full sm:w-[calc(100%/2)] md:w-[calc(100%/3)] lg:w-[calc(100%/4)]">
        <img src="{{ asset('assets/images/facilities/gym.jpg') }}" alt="Fitness Center"
          class="w-full h-56 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2">Fully Equipped Gym</h3>
          <p class="text-gray-600">
            Tetap bugar selama liburan Anda dengan fasilitas gym modern kami.
          </p>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden flex-shrink-0 w-full sm:w-[calc(100%/2)] md:w-[calc(100%/3)] lg:w-[calc(100%/4)]">
        <img src="{{ asset('assets/images/facilities/playground.jpeg') }}" alt="Kids Club"
          class="w-full h-56 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2">Kids Club</h3>
          <p class="text-gray-600">
            Area bermain yang aman dan menyenangkan untuk anak-anak.
          </p>
        </div>
      </div>

      <!-- Card 7 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden flex-shrink-0 w-full sm:w-[calc(100%/2)] md:w-[calc(100%/3)] lg:w-[calc(100%/4)]">
        <img src="{{ asset('assets/images/facilities/bisnis-center.jpeg') }}" alt="Business Center"
          class="w-full h-56 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2">Business Center</h3>
          <p class="text-gray-600">
            Fasilitas bisnis lengkap dengan komputer, printer, dan internet cepat.
          </p>
        </div>
      </div>

      <!-- Card 8 -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden flex-shrink-0 w-full sm:w-[calc(100%/2)] md:w-[calc(100%/3)] lg:w-[calc(100%/4)]">
        <img src="{{ asset('assets/images/facilities/tennis.jpeg') }}" alt="Tennis Court"
          class="w-full h-56 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2"></h3>
          <p class="text-gray-600">
            Nikmati bermain tenis di lapangan tenis outdoor kami dengan fasilitas lengkap.
          </p>
        </div>
      </div>
    </div>

    <!-- Navigation Buttons -->
    <button id="prev" class="absolute top-1/2 left-2 sm:left-4 transform -translate-y-1/2 bg-gray-800 text-white px-3 sm:px-4 py-2 rounded-full opacity-50 hover:opacity-100">
      &larr;
    </button>
    <button id="next" class="absolute top-1/2 right-2 sm:right-4 transform -translate-y-1/2 bg-gray-800 text-white px-3 sm:px-4 py-2 rounded-full opacity-50 hover:opacity-100">
      &rarr;
    </button>
  </div>
</div>

