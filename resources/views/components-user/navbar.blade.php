<div class="fixed top-0 left-0 w-full z-50">
    <!-- navbar -->
    <nav class="px-4 lg:px-6 py-2.5 mt-3">
        <div class="backdrop-blur bg-white/50 flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-6 shadow-lg rounded-xl">
            <!-- Logo -->
            <a href="#" class="flex items-center">
                <h1 class="self-center text-xl font-semibold whitespace-nowrap dark:text-black">
                    Hotel<span class="text-blue-700 font-bold">Danz</span>
                </h1>
            </a>
            <!-- Mobile Menu Button -->
            <button 
                id="menu-toggle" 
                type="button" 
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" 
                aria-controls="navbar" 
                aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </button>
            <!-- Navigation Links -->
            <div id="navbar" class="hidden w-full md:flex md:w-auto">
                <ul class="flex flex-col font-medium mt-4 md:mt-0 md:flex-row md:space-x-8">
                    <li>
                        <a href="#" class="block py-2 px-3 text-black rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:hover:text-yellow-500">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-black rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:hover:text-yellow-500">About</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-black rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:hover:text-yellow-500">Rooms</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-black rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:hover:text-yellow-500">Facilities</a>
                    </li>
                    @guest
                        <li>
                            <a href="{{ route('get-login') }}" class="block w-[100px] h-[30px] text-center bg-black text-white rounded-lg border border-black">Login</a>
                        </li>
                    @endguest
                    @auth
                        <li>
                            <form action="{{route('get-logout')}}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-[100px] h-[30px] text-center bg-black text-white rounded-lg border border-black">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>



