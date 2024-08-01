<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- style --}}
    @vite('resources/css/register.css')

</head>

<body>
    <div id="page" class="site">
        <div class="container">
            <div class="form-box">
                <div class="progress">
                    <div class="logo"><a href="/"><span>Alur</span>Kerja</a></div>
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
                    <div class="form-one form-step">
                        <div class="bg-svg"></div>
                        <h2>Personal Information</h2>
                        <p>Enter your personal information correctly</p>
                        <div>
                            <label>Your Name</label>
                            <input type="text" placeholder="e.g. John Smith">
                        </div>
                        <div>
                            <label>Your Company</label>
                            <div class="grouping">
                                <input type="text" placeholder="e.g. PT Javan Cipta Solusi">
                                <label>Company Size:</label>
                                <input type="text" placeholder="e.g. John Smith">
                            </div>
                        </div>
                        <div>
                            <label>Your Position</label>
                            <input type="text" placeholder="e.g. John Smith">
                        </div>
                    </div>
                    <div class="form-two form-step">
                        <div class="bg-svg"></div>
                        <h2>Contact</h2>
                        <div>
                            <label>WhatsApp</label>
                            <input type="tel" placeholder="+62xxxxxxxxxxx">
                        </div>
                        <div>
                            <label>Address</label>
                            <input type="text" placeholder="+62xxxxxxxxxxx">
                        </div>
                        <div>
                            <label>City</label>
                            <input type="text" placeholder="+62xxxxxxxxxxx">
                        </div>
                        <div>
                            <label>Province</label>
                            <input type="text" placeholder="+62xxxxxxxxxxx">
                        </div>
                    </div>
                    <div class="form-three form-step">
                        <div class="bg-svg">
                            <h2>Security</h2>
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
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn-prev" disable>Back</button>
                        <button type="button" class="btn-prev">Next Step</button>
                        <button type="button" class="btn-prev">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/register.js') }}"></script>
</body>

</html>
