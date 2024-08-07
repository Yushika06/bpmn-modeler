@extends('layouts.app')


@section('content')
    <style>
        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .navigation-links a {
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div class="bg-gray-100">

        <div>
            <div x-data="{ open: false }" class="relative overflow-hidden bg-sky-700 pb-32">
                <nav class="bg-transparent relative z-10 border-b border-teal-500 border-opacity-25 lg:border-none lg:bg-transparent"
                    x-state:on="Menu open" x-state:off="Menu closed"
                    :class="{ 'bg-sky-900': open, 'bg-transparent': !(open) }">
                    <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">
                        <div class="relative flex h-16 items-center justify-between lg:border-b lg:border-sky-800">
                            <div class="flex items-center px-2 lg:px-0">
                                <div class="hidden lg:ml-6 lg:block lg:space-x-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div aria-hidden="true" x-state:on="Menu open" x-state:off="Menu closed"
                    class="inset-y-0 absolute inset-x-0 left-1/2 w-full -translate-x-1/2 transform overflow-hidden lg:inset-y-0"
                    :class="{ 'bottom-0': open, 'inset-y-0': !(open) }">
                    <div class="absolute inset-0 flex">
                        <div class="h-full w-1/2" style="background-color: #0a527b"></div>
                        <div class="h-full w-1/2" style="background-color: #065d8c"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <svg class="flex-shrink-0" width="1750" height="308" viewBox="0 0 1750 308"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M284.161 308H1465.84L875.001 182.413 284.161 308z" fill="#0369a1"></path>
                            <path d="M1465.84 308L16.816 0H1750v308h-284.16z" fill="#065d8c"></path>
                            <path d="M1733.19 0L284.161 308H0V0h1733.19z" fill="#0a527b"></path>
                            <path d="M875.001 182.413L1733.19 0H16.816l858.185 182.413z" fill="#0a4f76"></path>
                        </svg>
                    </div>
                </div>
                <header class="relative py-10">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold tracking-tight text-white">Settings</h1>
                    </div>
                </header>
            </div>

            <main class="relative -mt-32">
                <div class="mx-auto max-w-screen-xl px-4 pb-6 sm:px-6 lg:px-8 lg:pb-16">
                    <div class="overflow-hidden rounded-lg bg-white shadow">
                        <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                            <aside class="py-6 lg:col-span-3">
                                <nav class="space-y-1">

                                    <div class="navigation-links">
                                        <a href="#profile-section"
                                           class="bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium"
                                           aria-current="page"
                                           onclick="showSection(event, 'profile')">
                                            <svg class="text-teal-500 group-hover:text-teal-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span class="truncate">Profile</span>
                                        </a>

                                        <a href="#account-section"
                                           class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group border-l-4 px-3 py-2 flex items-center text-sm font-medium"
                                           onclick="showSection(event, 'account')">
                                            <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495"></path>
                                            </svg>
                                            <span class="truncate">Account</span>
                                        </a>

                                        <a href="#company-section"
                                           class="border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group border-l-4 px-3 py-2 flex items-center text-sm font-medium"
                                           onclick="showSection(event, 'company')">
                                            <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z"></path>
                                            </svg>
                                            <span class="truncate">Company</span>
                                        </a>
                                    </div>
                                </nav>
                            </aside>

                            <form class="divide-y divide-gray-200 lg:col-span-9" action="{{ route('profile.update') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <!-- Profile section -->
                                <div id="profile-section" class="form-section active py-6 px-4 sm:p-6 lg:pb-8">
                                    <div>
                                        <h2 class="text-lg font-medium leading-6 text-gray-900">Profile</h2>
                                        <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so
                                            be careful what you share.</p>
                                    </div>

                                    <div class="mt-6 flex flex-col lg:flex-row">
                                        <div class="flex-grow space-y-6">
                                            <div>
                                                <label for="username"
                                                    class="block text-sm font-medium text-gray-700">Username</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <span
                                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 first-letter:bg-gray-50 px-3 text-gray-500 sm:text-sm">javan.co.id/alurkerja/</span>
                                                    <input type="text" name="username" id="username"
                                                        autocomplete="username"
                                                        class="block w-full min-w-0 flex-grow rounded-none rounded-md border border-gray-300 focus:border-sky-500 focus:ring-sky-500 sm:text-sm"
                                                        value="{{ old('username', $user->name) }}" disabled>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="address_detail"
                                                    class="block text-sm font-medium text-gray-700">Address</label>
                                                <div class="mt-1">
                                                    <textarea id="address_detail" name="address_detail" rows="3"
                                                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"
                                                        disabled>  {{ old('address_detail', $address_detail->address ?? '') }}</textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">Street address for your profile</p>
                                            </div>
                                        </div>
                                        <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-shrink-0 lg:flex-grow-0">
                                            <p class="text-sm font-medium text-gray-700" aria-hidden="true">Photo</p>
                                            <div class="mt-1 lg:hidden">
                                                <div class="flex items-center">
                                                    <div class="inline-block h-12 w-12 flex-shrink-0 overflow-hidden rounded-full"
                                                        aria-hidden="true">
                                                        <img class="h-full w-full rounded-full"
                                                            src="{{ auth()->user()->profile_picture }}" alt="">
                                                    </div>
                                                    <div class="ml-5 rounded-md shadow-sm">
                                                        <div
                                                            class="group relative flex items-center justify-center rounded-md border border-gray-300 py-2 px-3 focus-within:ring-2 focus-within:ring-sky-500 focus-within:ring-offset-2 hover:bg-gray-50">
                                                            <label for="mobile-user-photo"
                                                                class="pointer-events-none relative text-sm font-medium leading-4 text-gray-700">
                                                                <span>Change</span>
                                                                <span class="sr-only"> user photo</span>
                                                            </label>
                                                            <input id="mobile-user-photo" name="user-photo"
                                                                type="file"
                                                                class="absolute h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="relative hidden overflow-hidden rounded-full lg:block">
                                                @if (Str::startsWith(auth()->user()->profile_picture, 'http'))
                                                    <img class="relative h-40 w-40 rounded-full"
                                                        src="{{ auth()->user()->profile_picture }}" alt="">
                                                @else
                                                    <img class="relative h-40 w-40 rounded-full"
                                                        src="{{ asset('photo/' . auth()->user()->profile_picture) }}"
                                                        alt="Profile Picture">
                                                @endif
                                                <label for="profile_picture"
                                                    class="absolute inset-0 flex h-full w-full items-center justify-center bg-black bg-opacity-75 text-sm font-medium text-white opacity-0 focus-within:opacity-100 hover:opacity-100">
                                                    <span>Change</span>
                                                    <span class="sr-only"> user photo</span>
                                                    <input type="file" id="profile_picture" name="profile_picture"
                                                        class="absolute inset-0 h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0"
                                                        disabled>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 grid grid-cols-12 gap-6">
                                        <div class="col-span-12 sm:col-span-6">
                                            <label for="province"
                                                class="block text-sm font-medium text-gray-700">Province</label>
                                            <input type="text" name="province" id="province"
                                                autocomplete="given-name"
                                                class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                                value="{{ old('province', $user->addressDetail->province->name ?? '') }}"
                                                disabled>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            <label for="city"
                                                class="block text-sm font-medium text-gray-700">City</label>
                                            <input type="text" name="city" id="city"
                                                autocomplete="family-name"
                                                class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                                value="{{ old('city', $user->addressDetail->city->name ?? '') }}" disabled>
                                        </div>
                                        <div class="col-span-12">
                                            <label for="position"
                                                class="block text-sm font-medium text-gray-700">Position</label>
                                            <input type="text" name="position" id="position"
                                                class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                                value="{{ old('position', $user->position->name ?? '') }}" disabled>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            <label for="company"
                                                class="block text-sm font-medium text-gray-700">Company</label>
                                            <input type="text" name="company" id="company"
                                                autocomplete="organization"
                                                class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                                value="{{ old('company', $user->company->name) }}" disabled>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            <label for="whatsapp_number"
                                                class="block text-sm font-medium text-gray-700">WhatsApp</label>
                                            <input type="tel" name="whatsapp_number" id="whatsapp_number"
                                                autocomplete="family-name"
                                                class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                                value="{{ old('whatsapp', $user->whatsapp_number) }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                {{-- Account Section --}}
                                <div id="account-section" class="form-section form-settings py-6 px-4 sm:p-6 lg:pb-8">
                                    <div>
                                        <h2 class="text-lg font-medium leading-6 text-gray-900">Account</h2>
                                        <p class="mt-1 text-sm text-gray-500">Your information is secured, nobody can see
                                            your information.</p>
                                    </div>
                                    <div class="mt-6 flex flex-col lg:flex-row">
                                        <div class="flex-grow space-y-6">
                                        </div>
                                    </div>

                                    <div class="mt-6 grid grid-cols-12 gap-6">
                                        <div class="col-span-12 sm:col-span-6">
                                            <label for="province" class="block text-sm font-medium text-gray-700">Email
                                                Address</label>
                                            <input type="text" name="email" id="email"
                                                autocomplete="given-name"
                                                class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                                value="{{ old('email', $user->email ?? '') }}" disabled>
                                        </div>
                                    </div>
                                    <div class="mt-6 grid grid-cols-12 gap-6">
                                        <div class="col-span-12 sm:col-span-6">
                                            <label for="password"
                                                class="block text-sm font-medium text-gray-700">Password</label>
                                            <input type="password" name="password" id="password"
                                                class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="mt-6 grid-cols-12 gap-6 hidden">
                                        <div class="col-span-12 sm:col-span-6">
                                            <label for="password-confirm"
                                                class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                            <input type="password" name="password-confirmation" id="password-confirm"
                                                class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                                disabled>
                                        </div>
                                    </div>
                                </div>

                                {{-- Company Section --}}
                                <div id="company-section" class="form-section form-settings py-6 px-4 sm:p-6 lg:pb-8">
                                    <div>
                                        <h2 class="text-lg font-medium leading-6 text-gray-900">Company</h2>
                                        <p class="mt-1 text-sm text-gray-500">Your company information is secured, nobody
                                            can see your company information.</p>
                                    </div>
                                    <div class="mt-6 flex flex-col lg:flex-row">
                                        <div class="flex-grow space-y-6">
                                        </div>
                                    </div>

                                    <div class="mt-6 grid grid-cols-12 gap-6">
                                        <div class="col-span-12 sm:col-span-6">
                                            <label for="company"
                                                class="block text-sm font-medium text-gray-700">Company</label>
                                            <input type="text" name="company" id="company"
                                                autocomplete="organization"
                                                class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                                value="{{ old('company', $user->company->name) }}" disabled>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6">
                                            <label for="company_size_name"
                                                class="block text-sm font-medium text-gray-700">Company Size</label>
                                            <input type="text" name="company_size_name" id="company-size_name"
                                                autocomplete="organization"
                                                class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                                value="{{ old('company', $user->company->name) }}" disabled>
                                        </div>
                                        <div class="col-span-12">
                                            <label for="position" class="block text-sm font-medium text-gray-700">Position
                                                list</label>
                                            <input type="text" name="position" id="position"
                                                autocomplete="organization"
                                                class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"
                                                value="{{ old('company', $user->company->name) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-end py-4 px-4 sm:px-6">
                                    <button type="button" id="editButton"
                                        class="ml-5 inline-flex justify-center rounded-md border border-transparent bg-sky-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Edit
                                        Profile</button>
                                    <button type="submit" id="saveButton"
                                        class="ml-5 inline-flex justify-center rounded-md border border-transparent bg-sky-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2"
                                        style="display: none;">Save</button>
                                </div>
                        </div>
                        </form>
                    </div>
                    <script>
                        function showSection(event, section) {
                            event.preventDefault();

                            // Hide all sections
                            document.querySelectorAll('.form-section').forEach(function(section) {
                                section.classList.remove('active');
                            });

                            // Show the selected section
                            document.getElementById(section + '-section').classList.add('active');

                            // Reset all navigation link classes
                            document.querySelectorAll('.navigation-links a').forEach(function(link) {
                                link.className =
                                    'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900 group border-l-4 px-3 py-2 flex items-center text-sm font-medium';
                                const svg = link.querySelector('svg');
                                svg.className = 'text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6';
                            });

                            // Set the active class for the clicked link
                            const activeLink = document.querySelector('a[href="#' + section + '-section"]');
                            activeLink.className =
                                'bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium';
                            const activeSvg = activeLink.querySelector('svg');
                            activeSvg.className = 'text-teal-500 group-hover:text-teal-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6';
                        }

                        // Initialize the default active section
                        showSection(new Event('load'), 'profile');

                        document.addEventListener('DOMContentLoaded', function() {
                            const editButton = document.getElementById('editButton');
                            const saveButton = document.getElementById('saveButton');
                            const inputs = document.querySelectorAll('input, textarea');

                            editButton.addEventListener('click', function() {
                                inputs.forEach(input => input.disabled = false);
                                editButton.style.display = 'none';
                                saveButton.style.display = 'block';
                            });
                        });
                    </script>
                </div>
        </div>
        </main>
    </div>
    </div>
@endsection
