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
                    <form id="registerForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-one form-step active">
                            <div class="bg-svg"></div>
                            <h2><i class="fa-solid fa-address-card"></i> Personal Information</h2>
                            <p>Enter your personal information correctly</p>
                            <div>
                                <label for="name">Your Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div>
                                <label for="company_name">Your Company</label>
                                <input list="companies" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
                                <datalist id="companies">
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div>
                                <label for="company_size_name">Company Size</label>
                                <input list="company_sizes" id="company_size_name" name="company_size_name" value="{{ old('company_size_name') }}" required>
                                <datalist id="company_sizes">
                                    @foreach ($company_sizes as $company_size)
                                        <option value="{{ $company_size->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div>
                                <label for="position_name">Position</label>
                                <input list="positions" id="position_name" name="position_name" value="{{ old('position_name') }}" required>
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
                                <label for="whatsapp_number">WhatsApp</label>
                                <input id="whatsapp_number" type="tel" class="form-control" name="whatsapp_number" value="{{ old('whatsapp_number') }}">
                            </div>
                            <div>
                                <label for="province_name">Province</label>
                                <input list="provinces" id="province_name" name="province_name" value="{{ old('province_name') }}" required>
                                <datalist id="provinces">
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->name }}" data-id="{{ $province->id }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div>
                                <label for="city_name">City</label>
                                <input list="cities" id="city_name" name="city_name" value="{{ old('city_name') }}" required>
                                <datalist id="cities">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->name }}" data-province="{{ $city->province->name }}" data-province-id="{{ $city->province_id }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div>
                                <label for="address_detail">Address Detail</label>
                                <input id="address_detail" type="text" class="form-control" name="address_detail" value="{{ old('address_detail') }}" required>
                            </div>
                        </div>
                        <div class="form-three form-step">
                            <div class="bg-svg"></div>
                            <h2><i class="fa-solid fa-user-lock"></i> Security</h2>
                            <div>
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div>
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                            <div>
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
            // Data initialization
            const citiesByProvince = @json($citiesByProvince);
            const citiesList = document.getElementById('cities');
            const provinceList = document.getElementById('provinces');
            const hiddenProvinceInput = document.createElement('input');
            hiddenProvinceInput.type = 'hidden';
            hiddenProvinceInput.name = 'province_id';
            document.getElementById('registerForm').appendChild(hiddenProvinceInput);

            // Automatically populate cities based on selected province
            document.getElementById('province_name').addEventListener('input', function() {
                const provinceName = this.value;
                const provinceOption = Array.from(provinceList.options).find(option => option.value === provinceName);
                const provinceId = provinceOption ? provinceOption.getAttribute('data-id') : null;

                if (provinceId) {
                    citiesList.innerHTML = '';
                    hiddenProvinceInput.value = provinceId;

                    citiesByProvince[provinceId].forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.name;
                        option.setAttribute('data-province', provinceName);
                        option.setAttribute('data-province-id', provinceId);
                        citiesList.appendChild(option);
                    });
                }
            });

            // Automatically set province based on selected city
            document.getElementById('city_name').addEventListener('input', function() {
                const cityName = this.value;
                const cityOption = Array.from(citiesList.options).find(option => option.value === cityName);
                const provinceName = cityOption ? cityOption.getAttribute('data-province') : '';
                const provinceId = cityOption ? cityOption.getAttribute('data-province-id') : null;

                if (provinceName) {
                    const provinceInput = document.getElementById('province_name');
                    provinceInput.value = provinceName;
                    hiddenProvinceInput.value = provinceId;
                    provinceInput.readOnly = true;
                } else {
                    const provinceInput = document.getElementById('province_name');
                    provinceInput.readOnly = false;
                }
            });

            // Enable province input if city input is cleared
            document.getElementById('city_name').addEventListener('change', function() {
                if (!this.value) {
                    const provinceInput = document.getElementById('province_name');
                    provinceInput.readOnly = false;
                    hiddenProvinceInput.value = '';
                }
            });

            // Multiple step form navigation
            document.addEventListener('DOMContentLoaded', function() {
                const nextButton = document.querySelector('.btn-next');
                const prevButton = document.querySelector('.btn-prev');
                const submitButton = document.querySelector('.btn-submit');
                const steps = document.querySelectorAll('.form-step');
                let activeStep = 0;

                // Function to update form step visibility
                function updateStepVisibility() {
                    steps.forEach((step, index) => {
                        step.classList.toggle('active', index === activeStep);
                    });
                    prevButton.disabled = activeStep === 0;
                    nextButton.style.display = activeStep === steps.length - 1 ? 'none' : 'inline-block';
                    submitButton.style.display = activeStep === steps.length - 1 ? 'inline-block' : 'none';
                }

                // Next step button click event
                nextButton.addEventListener('click', function() {
                    if (activeStep < steps.length - 1) {
                        activeStep++;
                        updateStepVisibility();
                    }
                });

                // Previous step button click event
                prevButton.addEventListener('click', function() {
                    if (activeStep > 0) {
                        activeStep--;
                        updateStepVisibility();
                    }
                });

                // Initialize form step visibility
                updateStepVisibility();
            });
        </script>


    </div>
</body>

</html>
