<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$tutorial->judul_tutorial}} | ReVibeCRAFT</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="bg-orange-50">
        <header>
            <nav class="bg-orange-300 border-gray-200 px-4 lg:px-6 py-2.5">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="{{ url('/') }}" class="flex items-center"><span class="text-white self-center text-2xl font-semibold whitespace-nowrap">ReVibeCRAFT</span></a>
                    @auth
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button
                          @click="dropdownOpen = !dropdownOpen"
                          class="relative z-10 rounded-md p-2  
                          bg-orange-500 hover:bg-orange-600
                           text-gray-200  px-6 text-sm py-3 flex items-center
                           focus:outline-none focus:border-white"
                        >
                            <img
                                src="{{ Auth::user()->user_image ? Auth::user()->user_image : asset('vendor/adminlte3/img/user2-160x160.jpg') }}"
                                class="user-image w-8 h-8 rounded-full elevation-2"
                                alt="User Image"
                            />
                            <span class="pl-2 text-sm text-bold"><b>{{Auth::user()->name}}</b></span>
                        </button>
                        <div
                          x-show="dropdownOpen"
                          @click="dropdownOpen = false"
                          class="fixed inset-0 h-full w-full z-10"
                        ></div>
                
                        <div
                          x-show="dropdownOpen"
                          class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20"
                        >
                          <a
                            href="{{ route('logout') }}"
                            class="block px-4 py-2 text-sm capitalize text-gray-800 hover:bg-orange-500 hover:text-white"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                          >
                            <form
                                id="logout-form"
                                action="{{ route('logout') }}"
                                method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                          </a>
                        </div>
                      </div>                       
                    @else
                        <div class="flex items-center lg:order-2">
                            <a href="{{ route('login') }}" class="text-white hover:bg-white hover:text-orange-600 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">Log in</a
                            ><a href="{{ route('register') }}" class="text-white bg-orange-500 hover:bg-orange-600 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">Register</a
                            ><button type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu-2" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endauth
                    
                </div>
            </nav>
        </header>
        <div class="relative isolate px-6 py-14 pb-32 lg:px-8 bg-orange-300">
            <!-- Container -->
            <div class="container mt-16 mx-auto p-4 md:p-0">
            
                <!-- Card wrapper -->
                <div class="shadow-lg flex flex-wrap w-full lg:w-4/5 mx-auto">
                
                <!-- Card image -->
                <div class="bg-cover bg-bottom border w-1/3 h-[400px] relative" style="background-image:url('{{asset('storage/assets/fotos/'.$tutorial->foto)}}')">
                    <div class="absolute text-xl">
                    <i class="fa fa-heart text-white hover:text-red-light ml-4 mt-4 cursor-pointer"></i>
                    </div>
                </div>
                <!-- ./Card image -->
                
                <!-- Card body -->
                <div class="bg-white w-full md:w-2/3">
                    <!-- Card body - outer wrapper -->
                    <div class="h-full mx-auto px-6 md:px-0 md:pt-6 md:-ml-6 relative">
                    <!-- Card body - inner wrapper -->
                    <div class="bg-white lg:h-full p-6 -mt-6 md:mt-0 relative mb-4 md:mb-0 flex flex-wrap md:flex-wrap items-center">
                        <!-- Card title and subtitle -->
                        <div class="w-full lg:w-1/5 lg:border-right lg:border-solid text-center md:text-left">
                        <h3>{{$tutorial->judul_tutorial}}</h3>
                        <hr class="w-1/4 md:ml-0 mt-4  border lg:hidden">
                        </div>
                        <!-- ./Card title and subtitle -->
                        
                        <!-- Card description -->
                        <div class="w-full lg:w-3/5 lg:px-3">
                        <p class="text-md mt-4 lg:mt-0 text-justify md:text-left text-sm">
                            {{$tutorial->deskripsi}}
                        </p>
                        <p class="text-md mt-4 lg:mt-0 text-justify md:text-left text-sm">
                            {{$tutorial->bahan}}
                        </p>
                        <p class="text-md mt-4 lg:mt-0 text-justify md:text-left text-sm">
                            {{$tutorial->alat}}
                        </p>
                        <p class="text-md mt-4 lg:mt-0 text-justify md:text-left text-sm">
                            {{$tutorial->langkah_tutorial}}
                        </p>
                        </div>
                        <!-- ./Card description -->
                        
                        <!-- Call to action button -->
                        <div class="w-full lg:w-1/5 mt-6 lg:mt-0 lg:px-4 text-center md:text-left">
                            <a href="{{url('/')}}" class="rounded-md bg-orange-500  px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">kembali</a>
                        </div>
                        <!-- ./Call to action button -->
                    </div>
                    <!-- ./Card body - inner wrapper -->
                    </div>
                    <!-- ./Card body - outer wrapper -->
                </div>
                <!-- ./Card body -->
                </div>
                <!-- ./Card wrapper -->
            </div>
            <!-- ./Container -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>
</html>