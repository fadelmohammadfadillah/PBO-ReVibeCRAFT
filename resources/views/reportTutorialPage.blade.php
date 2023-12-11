<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feedback| ReVibeCRAFT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('vendor/adminlte3/plugins/jquery/jquery.min.js') }}"></script>
        {{-- <!-- Bootstrap 4 -->
    <script src="{{ asset('vendor/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
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
        <section class="content bg-orange-300 py-48 h-full flex justify-center item-center">
            <div class="max-w-md bg-white rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <b class="text-center text-2xl block py-2 pb-8">Report Tutorial</b>
                    <form method="post" action="{{ url($tutorial->id.'/addReport') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-4">
                            <div class="mb-4">
                                <label for="inputJudul" class="block text-sm font-medium text-gray-700">Judul</label>
                                <input type="text" id="inputJudul" name="judul_tutorial" 
                                    class="mt-1 p-2 pr-8 w-full border rounded-md @error('judul_tutorial') border-red-500 @enderror" 
                                    placeholder="Judul" value="{{ $tutorial->judul_tutorial }}" required autocomplete="judul_tutorial">
                                @error('judul_tutorial')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                
                            <div class="mb-4">
                                <label for="inputDeskripsi" class="block text-sm font-medium text-gray-700">Deskripsi kesalahan</label>
                                <textarea type="text" id="inputDeskripsi" name="deskripsi" 
                                class="mt-1 p-2 pr-32 w-full border rounded-md @error('deskripsi') border-red-500 @enderror" 
                                placeholder="Masukkan alasan tutorial dilaporkan" value="{{ old('deskripsi') }}" required autocomplete="deskripsi"></textarea>
                                @error('deskripsi')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ url('/') }}" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-orange-400 shadow-sm hover:text-orange-500 outline outline-2 outline-orange-300">Cancel</a>
                            <button type="submit" class="rounded-md text-white px-3.5 py-2.5 text-sm font-semibold bg-orange-300 shadow-sm hover:bg-orange-500 ml-2">Report Tutorial</button>
                        </div>
                
                        <input type="hidden" name="user_id" id="userId" value="">
                    </form>
            </div>
            </div>
            
        </section>
        
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script>
        $(document).ready(function(){
            let userId = {{Auth::user()->id}};
            $('#userId').val(userId);
            console.log(userId);
        })
    </script>
</body>
</html>
