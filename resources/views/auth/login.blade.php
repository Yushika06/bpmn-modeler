<title>Log in to Alurkerja</title>
<!-- Fonts -->
@vite('resources/css/app.css')
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<!-- Session Status -->
<x-auth-session-status :status="session('status')" />



<form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- Login Form -->
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-md sm:mx-auto transform scale-85">
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl" style="padding: 10px; margin: 10px;">
            </div>
            <div class="relative px-4 py-6 bg-white shadow-lg sm:rounded-3xl sm:p-10">
                <div class="mb-6">
                    {{-- back button --}}
                    <div class="flex justify-between gap-2 mb-6">
                        <a href="/"
                            class="inline-flex items-center border border-indigo-300 px-3 py-0.5 rounded-md text-indigo-500 hover:bg-indigo-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18">
                                </path>
                            </svg>
                            <span class="ml-1 font-bold text-lg">Back</span>
                        </a>
                    </div>
                    <div class="relative flex justify-center text-sm">
                         <a href="/">
                             <img src="{{ asset('images/AlurKerja.png') }}" alt="">
                         </a>
                     </div>
                 </div>

                 <div>
                     <x-input-label for="email" :value="__('Email')" />
                     <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                         :value="old('email')" required autofocus autocomplete="username" />
                     <x-input-error :messages="$errors->get('email')" class="mt-2" />
                 </div>

                 <!-- Password -->
                 <div class="mt-4">
                     <x-input-label for="password" :value="__('Password')" />

                     <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                         autocomplete="current-password" />

                     <x-input-error :messages="$errors->get('password')" class="mt-2" />
                 </div>

                 <!-- Remember Me -->
                 <div class="block mt-4">
                     <label for="remember_me" class="inline-flex items-center">
                         <input id="remember_me" type="checkbox"
                             class="rounded to-sky-500 border-gray-300 dark:border-gray-700 text-sky-500 shadow-sm"
                             name="remember">
                         <span class="ms-2 text-sm text-gray-600 dark:text-gray-800">{{ __('Remember me') }}</span>
                     </label>
                 </div>

                 <div class="flex items-center justify-end mt-4">
                     @if (Route::has('password.request'))
                         <a class="underline text-sm text-gray-600 dark:text-gray-800 hover:text-gray-900 dark:hover:text-sky-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                             href="{{ route('password.request') }}">
                             {{ __('Forgot your password?') }}
                         </a>
                     @endif

                     <x-primary-button class="ms-3">
                         {{ __('Log in') }}
                     </x-primary-button>
                 </div>

                 <div class="mt-6">

                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                             <div class="w-full border-t border-gray-300"></div>
                         </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-800">
                                 Or continue with
                             </span>
                         </div>
                     </div>

                     <div class="mt-6 grid grid-cols-3 gap-3">
                         <div>
                             <a href="{{ route('socialite.redirect', 'google') }}"
                                 class="w-full flex items-center justify-center px-8 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gradient-to-r from-cyan-400 to-sky-500 shadow-xl">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                     viewBox="0 0 488 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                     <path
                                         d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
                                 </svg>
                             </a>
                        </div>
                        <div>
                            <a href="{{ route('socialite.redirect', 'github') }}"
                                 class="w-full flex items-center justify-center px-8 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gradient-to-r from-cyan-400 to-sky-500 shadow-xl">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                     viewBox="0 0 496 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                     <path
                                         d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z" />
                                 </svg>
                             </a>
                         </div>
                         <div>
                             <a href="{{ route('socialite.redirect', 'gitlab') }}"
                                 class="w-full flex items-center justify-center px-8 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gradient-to-r from-cyan-400 to-sky-500 shadow-xl">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                     viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                     <path
                                         d="M503.5 204.6L502.8 202.8L433.1 21C431.7 17.5 429.2 14.4 425.9 12.4C423.5 10.8 420.8 9.9 417.9 9.6C415 9.3 412.2 9.7 409.5 10.7C406.8 11.7 404.4 13.3 402.4 15.5C400.5 17.6 399.1 20.1 398.3 22.9L351.3 166.9H160.8L113.7 22.9C112.9 20.1 111.5 17.6 109.6 15.5C107.6 13.4 105.2 11.7 102.5 10.7C99.9 9.7 97 9.3 94.1 9.6C91.3 9.9 88.5 10.8 86.1 12.4C82.8 14.4 80.3 17.5 78.9 21L9.3 202.8L8.5 204.6C-1.5 230.8-2.7 259.6 5 286.6C12.8 313.5 29.1 337.3 51.5 354.2L51.7 354.4L52.3 354.8L158.3 434.3L210.9 474L242.9 498.2C246.6 500.1 251.2 502.5 255.9 502.5C260.6 502.5 265.2 500.1 268.9 498.2L300.9 474L353.5 434.3L460.2 354.4L460.5 354.1C482.9 337.2 499.2 313.5 506.1 286.6C514.7 259.6 513.5 230.8 503.5 204.6z" />
                                 </svg>
                             </a>
                         </div>
                     </div>
                 </div>

                 <div class="mt-6">
                     <div class="relative">
                         <div class="absolute inset-0 flex items-center">
                             <div class="w-full border-t border-gray-300"></div>
                         </div>
                         <div class="relative flex justify-center text-sm">
                             <span class="px-2 bg-white text-gray-800">
                                 Didn't have an account?
                             </span>
                         </div>
                     </div>

                     <div class="mt-6">
                         <a href="{{ route('register') }}"
                             class="w-full flex items-center justify-center px-8 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gradient-to-r from-cyan-400 to-sky-500 shadow-xl">
                             <h4>Register here </h4>
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 512 512">
                                 <path
                                     d="M352 96l64 0c17.7 0 32 14.3 32 32l0 256c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0c53 0 96-43 96-96l0-256c0-53-43-96-96-96l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-9.4 182.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L242.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
                             </svg>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </form>
