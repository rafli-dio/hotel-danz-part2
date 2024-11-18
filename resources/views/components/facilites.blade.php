<div class="container mx-auto mt-[70px]">
    <section class="room px-4">
        <div class="desc px-4 flex flex-col lg:flex-row justify-between items-center">
            <div class="w-[60%]">
                <p>Premium Facilities</p>
                <h2 class="text-[40px] font-poppins font-medium">Exclusive Premium <br> Facilities</h2>
            </div>
            <p class="w-[40%] mr-[100px]">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque error obcaecati, dolorum optio magni
                saepe eligendi tempore eaque qui distinctio, facilis corrupti. Praesentium, odit nemo.
            </p>
        </div>

        <div class="container-card mt-[50px] mx-auto px-4">
            <div id="slider-container" class="relative overflow-hidden max-w-full mx-auto px-4">
                <div id="slider" class="flex gap-4 transition-transform duration-200 ease-in-out w-max">
                    <!-- Card 1 -->
                    <div class="card-room bg-white shadow-md rounded-lg overflow-hidden flex-none w-[260px] md:w-[300px]">
                        <img src="{{ asset('assets/images/facilities/kolam-renang.jpg') }}" alt="Nature-Inspired Pool"
                            class="w-full h-48 object-cover rounded-2xl">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">Nature-Inspired Pool</h3>
                            <p class="text-gray-600">
                                Nikmati suasana alam yang menenangkan dengan kolam renang yang dikelilingi pepohonan hijau.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card-room bg-white shadow-md rounded-lg overflow-hidden flex-none w-[260px] md:w-[300px]">
                        <img src="{{ asset('assets/images/facilities/spa.jpg') }}" alt="Spa and Wellness"
                            class="w-full h-48 object-cover rounded-2xl">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">Spa and Wellness</h3>
                            <p class="text-gray-600">
                                Relaksasikan diri Anda dengan layanan spa profesional yang menyegarkan tubuh dan pikiran.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="card-room bg-white shadow-md rounded-lg overflow-hidden flex-none w-[260px] md:w-[300px]">
                        <img src="{{ asset('assets/images/facilities/luxury-room.jpg') }}" alt="Luxury Rooms"
                            class="w-full h-48 object-cover rounded-2xl">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">Luxury Rooms</h3>
                            <p class="text-gray-600">
                                Kamar mewah dengan desain modern dan fasilitas lengkap untuk kenyamanan Anda.
                            </p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="card-room bg-white shadow-md rounded-lg overflow-hidden flex-none w-[260px] md:w-[300px]">
                        <img src="{{ asset('assets/images/facilities/restaurant.jpg') }}" alt="Fine Dining Restaurant"
                            class="w-full h-48 object-cover rounded-2xl">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">Fine Dining Restaurant</h3>
                            <p class="text-gray-600">
                                Nikmati berbagai hidangan gourmet dari koki terbaik di restoran kami.
                            </p>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="card-room bg-white shadow-md rounded-lg overflow-hidden flex-none w-[260px] md:w-[300px]">
                        <img src="{{ asset('assets/images/facilities/gym.jpg') }}" alt="Fully Equipped Gym"
                            class="w-full h-48 object-cover rounded-2xl">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">Fully Equipped Gym</h3>
                            <p class="text-gray-600">
                                Tetap bugar selama liburan Anda dengan fasilitas gym modern kami.
                            </p>
                        </div>
                    </div>

                    <!-- Card 6: Kids Club -->
                    <div class="card-room bg-white shadow-md rounded-lg overflow-hidden flex-none w-[260px] md:w-[300px]">
                        <img src="{{ asset('assets/images/facilities/playground.jpeg') }}" alt="Kids Club"
                            class="w-full h-48 object-cover rounded-2xl">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">Kids Club</h3>
                            <p class="text-gray-600">
                                Area bermain yang aman dan menyenangkan untuk anak-anak.
                            </p>
                        </div>
                    </div>

                    <!-- Card 7: Business Center -->
                    <div class="card-room bg-white shadow-md rounded-lg overflow-hidden flex-none w-[260px] md:w-[300px]">
                        <img src="{{ asset('assets/images/facilities/bisnis-center.jpeg') }}" alt="Business Center"
                            class="w-full h-48 object-cover rounded-2xl">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">Business Center</h3>
                            <p class="text-gray-600">
                                Fasilitas bisnis lengkap dengan komputer, printer, dan internet cepat.
                            </p>
                        </div>
                    </div>

                    <!-- Card 8: Tennis -->
                    <div class="card-room bg-white shadow-md rounded-lg overflow-hidden flex-none w-[260px] md:w-[300px]">
                        <img src="{{ asset('assets/images/facilities/tennis.jpeg') }}" alt="Tennis Court"
                            class="w-full h-48 object-cover rounded-2xl">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">Tennis Court</h3>
                            <p class="text-gray-600">
                                Nikmati bermain tenis di lapangan tenis outdoor kami dengan fasilitas lengkap.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button id="prev" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-full opacity-50 hover:opacity-100">
                    &larr;
                </button>
                <button id="next" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-gray-800 text-white px-4 py-2 rounded-full opacity-50 hover:opacity-100">
                    &rarr;
                </button>
            </div>
        </div>
    </section>
</div>
