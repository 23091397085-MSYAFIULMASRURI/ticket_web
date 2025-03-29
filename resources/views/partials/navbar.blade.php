 <!-- Navbar -->
 <nav class="bg-white shadow-md">
     <div class="container mx-auto px-4 py-5 flex justify-between items-center">
         <!-- Brand -->
         <a href="/" class="text-xl font-bold text-blue-600">Event Ticket</a>

         <!-- Links (Desktop) -->
         <div class="hidden md:flex space-x-6">
             <a href="/" class="text-gray-700 hover:text-blue-500">Home</a>
             <a href="/event-list" class="text-gray-700 hover:text-blue-500">Events</a>
             <a href="/contact" class="text-gray-700 hover:text-blue-500">Contact</a>
             <a href="/about" class="text-gray-700 hover:text-blue-500">About</a>
         </div>

         <!-- User Dropdown -->
         <div class="relative hidden md:block">
             <button onclick="toggleDropdown()"
                 class="flex items-center space-x-2 text-gray-700 hover:text-blue-500 focus:outline-none">
                 <span>Hi, {{ Auth::user()->name ?? 'Guest' }}</span>
                 <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd"
                         d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                         clip-rule="evenodd" />
                 </svg>
             </button>

             <!-- Dropdown Menu -->
             <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg hidden">
                 <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                 <a href="/dashboard" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                 @if (Auth::check())
                     <!-- Jika user sudah login, tampilkan tombol Logout -->
                     <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <button type="submit"
                             class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                             Logout
                         </button>
                     </form>
                 @else
                     <!-- Jika user belum login, tampilkan tombol Login -->
                     <a href="{{ route('login') }}"
                         class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                         Login
                     </a>
                 @endif

             </div>
         </div>

         <!-- Mobile Menu Button -->
         <button onclick="toggleMobileMenu()" class="rounded-lg md:hidden text-gray-700 focus:outline-none">
             <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
             </svg>
         </button>
     </div>

     <!-- Mobile Menu -->
     <div id="mobileMenu" class=" rounded-lg hidden md:hidden">
         <a href="/" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Home</a>
         <a href="/event-list" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Events</a>
         <a href="/contact" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Contact</a>
         <a href="/about" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">About</a>

         <hr class="my-2">

         <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
         <a href="/dashboard" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
         @if (Auth::check())
             <!-- Jika user sudah login, tampilkan tombol Logout -->
             <form method="POST" action="{{ route('logout') }}">
                 @csrf
                 <button type="submit"
                     class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                     Logout
                 </button>
             </form>
         @else
             <!-- Jika user belum login, tampilkan tombol Login -->
             <a href="{{ route('login') }}"
                 class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                 Login
             </a>
         @endif

     </div>
 </nav>

 <script>
     function toggleDropdown() {
         document.getElementById('dropdownMenu').classList.toggle('hidden');
     }

     function toggleMobileMenu() {
         document.getElementById('mobileMenu').classList.toggle('hidden');
     }

     // Klik di luar dropdown untuk menutupnya
     document.addEventListener('click', function(event) {
         let dropdown = document.getElementById('dropdownMenu');
         if (!event.target.closest('.relative')) {
             dropdown.classList.add('hidden');
         }
     });
 </script>
