<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register to AlurKerja</title>

    {{-- style --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    @vite('resources/css/register.css')
    @vite('resources/css/socialite.css')

</head>

<body>
    <div class="wrapper">

        <div id="page" class="site">
            <div class="container">
                <div class="form-box">
                    <div class="progress">
                        <div class="logo"><a href="/"><span><img src="{{ asset('images/AlurKerja.png') }}"
                                        alt=""></span></a></div>
                        <ul class="progress-steps">
                            <li class="step active">
                                <span>1</span>
                                <p>Personal<br><span>25 secs to complete</span></p>
                            </li>
                            <li class="step">
                                <span>2</span>
                                <p>Contact<br><span>60 secs to complete</span></p>
                            </li>
                            <li class="step">
                                <span>3</span>
                                <p>Security<br><span>30 secs to complete</span></p>
                            </li>
                        </ul>
                        <div class="social-container">
                            <div class="separator">
                                <div class="text">Or continue with</div>
                            </div>

                            <div class="buttons-container">
                                <a href="{{ route('socialite.redirect', 'google') }}" class="social-btn">
                                    <img src="{{ asset('images/icons/google.png') }}" alt="">
                                </a>
                                <a href="{{ route('socialite.redirect', 'github') }}" class="social-btn">
                                    <img src="{{ asset('images/icons/github.png') }}" alt="">
                                </a>
                                <a href="{{ route('socialite.redirect', 'gitlab') }}" class="social-btn">
                                    <img src="{{ asset('images/icons/gitlab (1).png') }}" alt="">
                                </a>
                            </div>
                        </div>


                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-one form-step active">
                            <div class="bg-svg"></div>
                            <h2><i class="fa-solid fa-address-card"></i> Personal Information</h2>
                            <p>Enter your personal information correctly</p>
                            <div>
                                <label for="name">Your Name</label>
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name') }}" required>
                            </div>
                            <div>
                                <label for="company_name">Your Company</label>
                                <input list="companies" id="company_name" name="company_name"
                                    value="{{ old('company_name') }}" required>
                                <datalist id="companies">
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div>
                                <label for="company_size_name">Company Size</label>
                                <input list="company_sizes" id="company_size_name" name="company_size_name"
                                    value="{{ old('company_size_name') }}" required>
                                <datalist id="company_sizes">
                                    @foreach ($company_sizes as $company_size)
                                        <option value="{{ $company_size->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div>
                                <label for="position">Position</label>
                                <input list="positions" id="position" name="position" value="{{ old('position') }}"
                                    required>
                                <datalist id="positions">
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="form-two form-step">
                            <div class="bg-svg"></div>
                            <h2><i class="fa-solid fa-address-book"></i> Contact</h2>
                            <div>
                                <label for="number_whatsapp">WhatsApp </label>
                                <input id="number_whatsapp" type="text" class="form-control" name="number_whatsapp"
                                    value="{{ old('+6281234567890') }}" required>
                            </div>
                            <div>
                                <label for="address_detail">Address Detail</label>
                                <input id="address_details" type="text" class="form-control" name="address_detail"
                                    value="{{ old('e.g. Perum. Sukoharjo, Kec. Ngaglik') }}" required>
                            </div>
                            <div>
                                <label for="city">City</label>
                                <input list="cities" id="city" name="city" value="{{ old('city') }}"
                                    required>
                                <datalist id="cities">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div>
                                <label for="province">Province</label>
                                <input list="provinces" id="province" name="province" value="{{ old('province') }}"
                                    required>
                                <datalist id="provinces">
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="form-three form-step">
                            <div class="bg-svg"></div>
                            <h2><i class="fa-solid fa-user-lock"></i> Security</h2>
                            <div>
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('your email address') }}" required>
                            </div>
                            <div>
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                            <div>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn-prev" disabled>Back</button>
                            <button type="button" class="btn-next">Next Step</button>
                            <button type="submit" class="btn-submit btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            const nextButton = document.querySelector('.btn-next');
            const prevButton = document.querySelector('.btn-prev');
            const form = document.querySelector('form');
            const steps = document.querySelectorAll('.step');
            const form_steps = document.querySelectorAll('.form-step');
            let active = 1;

            nextButton.addEventListener('click', () => {
                active++;
                if (active > steps.length) {
                    active = steps.length;
                }
                updateProgress();
            });

            prevButton.addEventListener('click', () => {
                active--;
                if (active < 1) {
                    active = 1;
                }
                updateProgress();
            });

            const updateProgress = () => {
                console.log('step.length =>' + steps.length);
                console.log('active => ' + active);

                steps.forEach((step, i) => {
                    if (i == (active - 1)) {
                        step.classList.add('active');
                        form_steps[i].classList.add('active');
                        console.log('1 =>' + i);
                    } else {
                        step.classList.remove('active');
                        form_steps[i].classList.remove('active');
                    }
                });

                if (active === 1) {
                    prevButton.disabled = true;
                } else if (active === steps.length) {
                    nextButton.disabled = true;
                } else {
                    prevButton.disabled = false;
                    nextButton.disabled = false;
                }
            };
        </script>
    </div>
</body>

</html>
