@extends('layouts.dashboard')

@section('content')
    <!-- source https://gist.github.com/dsursulino/369a0998c0fc8c25e19962bce729674f -->

    <div class="bg-gradient-to-r from-cyan-100 to-sky-400 min-h-screen">
        <div class="fixed bg-white text-blue-800 px-10 py-1 z-10 w-full">
            <div class="flex items-center justify-between py-2 text-5x1">
                <div class="font-bold text-blue-900 text-xl">
                </div>
            </div>
        </div>

        <div class="flex flex-row pt-24 px-10 pb-4">
            <div class="w-2/12 mr-6">
                <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4">
                    <a href="/" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                        <span class="material-icons-outlined float-left pr-2">dashboard</span>
                        Home
                        <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                    </a>
                    <a href="/projects" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                        <span class="material-icons-outlined float-left pr-2">folder_copy</span>
                        My Projects
                        <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4">
                    <a href="{{ route('profile.edit') }}" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                        <span class="material-icons-outlined float-left pr-2">face</span>
                        Profile
                        <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                    </a>
                    <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                        <span class="material-icons-outlined float-left pr-2">settings</span>
                        Settings
                        <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                    </a>
                    <a href="{{ route('logout') }}" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                        <span class="material-icons-outlined float-left pr-2">power_settings_new</span>
                        Logout
                        <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                    </a>
                </div>
            </div>

            <div class="w-10/12">
                <div class="flex flex-row">
                    <div class="bg-no-repeat bg-sky-100 border border-sky-200 rounded-xl w-7/12 mr-2 p-6"
                        style="background-image: url(https://previews.dropbox.com/p/thumb/AAvyFru8elv-S19NMGkQcztLLpDd6Y6VVVMqKhwISfNEpqV59iR5sJaPD4VTrz8ExV7WU9ryYPIUW8Gk2JmEm03OLBE2zAeQ3i7sjFx80O-7skVlsmlm0qRT0n7z9t07jU_E9KafA9l4rz68MsaZPazbDKBdcvEEEQPPc3TmZDsIhes1U-Z0YsH0uc2RSqEb0b83A1GNRo86e-8TbEoNqyX0gxBG-14Tawn0sZWLo5Iv96X-x10kVauME-Mc9HGS5G4h_26P2oHhiZ3SEgj6jW0KlEnsh2H_yTego0grbhdcN1Yjd_rLpyHUt5XhXHJwoqyJ_ylwvZD9-dRLgi_fM_7j/p.png?fv_content=true&size_mode=5); background-position: 90% center;">
                        <p class="text-5xl text-indigo-900">Welcome <br><strong>Lorem Ipsum</strong></p>
                        <span
                            class="bg-sky-300 text-xl text-white inline-block rounded-full mt-12 px-8 py-2"><strong>01:51</strong></span>
                    </div>

                    <div class="bg-no-repeat bg-cyan-200 border border-cyan-300 rounded-xl w-5/12 ml-2 p-6"
                        style="background-image: url(https://previews.dropbox.com/p/thumb/AAuwpqWfUgs9aC5lRoM_f-yi7OPV4txbpW1makBEj5l21sDbEGYsrC9sb6bwUFXTSsekeka5xb7_IHCdyM4p9XCUaoUjpaTSlKK99S_k4L5PIspjqKkiWoaUYiAeQIdnaUvZJlgAGVUEJoy-1PA9i6Jj0GHQTrF_h9MVEnCyPQ-kg4_p7kZ8Yk0TMTL7XDx4jGJFkz75geOdOklKT3GqY9U9JtxxvRRyo1Un8hOObbWQBS1eYE-MowAI5rNqHCE_e-44yXKY6AKJocLPXz_U4xp87K4mVGehFKC6dgk_i5Ur7gspuD7gRBDvd0sanJ9Ybr_6s2hZhrpad-2WFwWqSNkh/p.png?fv_content=true&size_mode=5); background-position: 100% 40%;">
                        <p class="text-5xl text-indigo-900">Inbox <br><strong>23</strong></p>
                        <a href=""
                            class="bg-cyan-400 text-xl text-white underline hover:no-underline inline-block rounded-full mt-12 px-8 py-2"><strong>See
                                messages</strong></a>
                    </div>
                </div>
                <div class="flex flex-row h-64 mt-6">
                    <div class="bg-white rounded-xl shadow-lg px-6 py-4 w-4/12">
                        a
                    </div>
                    <div class="bg-white rounded-xl shadow-lg mx-6 px-6 py-4 w-4/12">
                        b
                    </div>
                    <div class="bg-white rounded-xl shadow-lg px-6 py-4 w-4/12">
                        c
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
