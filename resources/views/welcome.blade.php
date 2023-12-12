<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ReVibeCRAFT</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
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
            <div class="relative isolate px-6 pt-14 lg:px-8">
                <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true"></div>
                <div class="mx-auto max-w-2xl py-10 sm:py-48 lg:py-10">
                    <div class="text-center">
                        <div class="flex justify-center item-center">
                            <img src="{{asset('storage/assets/hero-ReVibeCRAFT.jpg')}}" alt="hero ReVibeCRAFT">
                        </div>
                        <p class="mt-6 text-lg leading-8 text-gray-600">Pelajari cara untuk membuat barang berguna dari sampah sehari-hari dengan mengikuti panduan kami.</p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            @auth
                                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Lihat tutorial lainnya</a>
                            @else
                                <a href="{{ route('register') }}" class="rounded-md bg-orange-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Gabung dengan kami!</a>
                                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Lihat tutorial lainnya</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-orange-600 py-10 sm:py-10">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-gray-200">Daur ulang dan selamatkan bumi!</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Ubah sampahmu menjadi barang berguna</p>
                    <p class="mt-6 text-lg leading-8 text-gray-200">Pelajari cara mendaur ulang sampah sehari-hari menjadi barang yang memiliki nilai guna dan estetika.</p>
                </div>
                <div class="grid grid-cols-3 gap-4 py-4">
                    {{-- @dd($tutorials) --}}
                    @foreach ($tutorials as $tutorial)
                        <div class="relative max-w-md bg-white rounded overflow-hidden shadow-lg">
                            <img class="w-full h-48 object-cover" src="{{asset('storage/assets/fotos/'.$tutorial->foto)}}" alt="Card Image">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{$tutorial->judul_tutorial}}</div>
                                <p class="text-gray-700 text-base mb-8">{{$tutorial->deskripsi}}</p>
                                <a href="{{ route('artikelTutorial', $tutorial) }}" class="rounded-md bg-orange-500  px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">lihat tutorial</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{route('viewFormFeedback')}}" class="rounded-md bg-white my-16 px-3.5 py-2.5 text-sm font-semibold text-orange-500 shadow-sm hover:text-orange-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Berikan Feedback</a>
            </div>
        </div>
        <!-- Tambahkan tombol untuk membuka modal -->

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </body>
</html>
