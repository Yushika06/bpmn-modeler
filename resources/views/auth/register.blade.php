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
                    </div>
                    <form action="">
                        <div class="form-one form-step active">
                            <div class="bg-svg"></div>
                            <h2><i class="fa-solid fa-address-card"></i> Personal Information</h2>
                            <p>Enter your personal information correctly</p>
                            <div>
                                <label>Your Name</label>
                                <input type="text" placeholder="e.g. John Smith">
                            </div>
                            <div>
                                <label>Your Company</label>
                                {{-- <div class="grouping"> --}}
                                <input type="text" placeholder="e.g. PT Javan Cipta Solusi">
                            </div>
                            <div>
                                <label>Company Size:</label>
                                <input type="text" placeholder="e.g. Medium - <500 employi">
                            </div>
                            <div>
                                <label>Your Position</label>
                                <input type="text" placeholder="e.g. PHP Programmer Internship">
                            </div>
                        </div>
                        <div class="form-two form-step">
                            <div class="bg-svg"></div>
                            <h2><i class="fa-solid fa-address-book"></i> Contact</h2>
                            <div>
                                <label>WhatsApp</label>
                                <input type="tel" placeholder="+62xxxxxxxxxxx">
                            </div>
                            <div>
                                <label>Address</label>
                                <input type="text" placeholder="Perum. Sukoharjo, Kec. Ngaglik">
                            </div>
                            <div>
                                <label>City</label>
                                <input type="text" placeholder="Sleman">
                            </div>
                            <div>
                                <label>Province</label>
                                <select name="provines" placeholder="e.g. Yogyakarta">
                                    <option value="">Please Select</option>
                                    <option value="1">Jawa Barat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-three form-step">
                            <div class="bg-svg"></div>
                            <h2><i class="fa-solid fa-user-lock"></i> Security</h2>
                            <div>
                                <label>Email</label>
                                <input type="email" placeholder="Your email address">
                            </div>
                            <div>
                                <label>Password</label>
                                <input type="password" placeholder="Password">
                            </div>
                            <div>
                                <input type="password" placeholder="Confirm password">
                            </div>
                            {{-- <div class="checkbox">
                            <input type="checkbox">
                            <label>Receive our news and special offers</label>
                        </div> --}}
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn-prev" disabled>Back</button>
                            <button type="button" class="btn-next">Next Step</button>
                            <button type="button" class="btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            const nextButton = document.querySelector('.btn-next');
            const prevButton = document.querySelector('.btn-prev');
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

                //toggle .active class for each list item
                steps.forEach((steps, i) => {
                    if (i == (active - 1)) {
                        steps.classList.add('active');
                        form_steps[i].classList.add('active');
                        console.log('1 =>' + i);
                    } else {
                        steps.classList.remove('active');
                        form_steps[i].classList.remove('active');
                    }
                })

                if (active === 1) {
                    prevButton.disabled = true;
                } else if (active === steps.length) {
                    nextButton.disabled = true;
                } else {
                    prevButton.disabled = false;
                    nextButton.disabled = false;
                }
            }
        </script>
    </div>
</body>

</html>
