<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Employee Management System</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

   <style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #fff;
    color: #16345f;
}

.login-page {
    min-height: 100vh;
    display: flex;
}


/* LEFT SIDE */

.left-side {
    width: 50%;
    min-height: 100vh;
    background: linear-gradient(135deg, #eef7ff, #e7f3ff);
    padding: 25px 30px;
    text-align: center;
}

.brand-icon {
    font-size: 40px;
    color: #123f9c;
    margin-bottom: 5px;
}

.left-side h1 {
    margin: 0;
    font-size: 28px;
    line-height: 1.2;
}

.description {
    margin: 12px auto 15px;
    font-size: 14px;
    line-height: 1.4;
}

.illustration {
    width: 60%;
    height: 180px;
    object-fit: contain;
    margin: 0 auto 10px;
    display: block;
}

.features {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    max-width: 500px;
    margin: auto;
}

.feature {
    padding: 0 8px;
    border-right: 1px solid #c9ddef;
}

.feature:last-child {
    border-right: none;
}

.feature-icon {
    width: 38px;
    height: 38px;
    margin: auto auto 6px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    background: #d9ebff;
    color: #1671d9;
}

.feature:nth-child(2) .feature-icon {
    background: #d7f5ed;
    color: #14a47d;
}

.feature:nth-child(3) .feature-icon {
    background: #e9dcff;
    color: #7742d5;
}

.feature:nth-child(4) .feature-icon {
    background: #d9f3fb;
    color: #1598c1;
}

.feature span {
    display: block;
    font-size: 11px;
    line-height: 1.3;
}


/* RIGHT SIDE */

.right-side {
    width: 50%;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.login-card {
    width: 100%;
    max-width: 400px;
    padding: 30px;
    border: 1px solid #dce8f5;
    border-radius: 10px;
    background: white;
    box-shadow: 0 6px 20px rgba(35, 100, 170, 0.10);
}


/* LOGIN HEADER */

.login-header {
    text-align: center;
    margin-bottom: 22px;
}

.login-icon {
    font-size: 40px;
    color: #1479ef;
    margin-bottom: 5px;
}

.login-header h2 {
    margin: 0;
    font-size: 26px;
}

.login-header p {
    margin: 5px 0 0;
    font-size: 14px;
    color: #6682a3;
}


/* ERROR */

.error {
    margin-bottom: 15px;
    padding: 8px 10px;
    border-radius: 5px;
    background: #f8d7da;
    color: #842029;
    font-size: 12px;
}


/* FORM */

.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;
    margin-bottom: 6px;
    font-size: 13px;
    font-weight: 600;
}

.input-wrapper {
    position: relative;
}

.form-control {
    width: 100%;
    height: 45px;
    padding: 0 42px 0 45px;
    border: 1px solid #d5e3f1;
    border-radius: 7px;
    outline: none;
    font-size: 13px;
}

.form-control:focus {
    border-color: #2681ed;
}

.input-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 17px;
    color: #7189a5;
}

.toggle-password {
    position: absolute;
    right: 0;
    top: 0;
    width: 42px;
    height: 45px;
    border: none;
    background: transparent;
    color: #7189a5;
    cursor: pointer;
}


/* OPTIONS */

.login-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 5px 0 18px;
}

.remember {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 12px;
}

.remember input {
    width: 15px;
    height: 15px;
}

.forgot {
    font-size: 12px;
    color: #0878ed;
    text-decoration: none;
}


/* BUTTON */

.login-btn {
    width: 100%;
    height: 45px;
    border: none;
    border-radius: 7px;
    background: #167bf0;
    color: white;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
}

.login-btn:hover {
    background: #0867d5;
}


/* FOOTER */

.login-footer {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 20px;
    font-size: 10px;
    color: #6482a3;
}

.login-footer::before,
.login-footer::after {
    content: "";
    height: 1px;
    background: #dce6ef;
    flex: 1;
}


/* MOBILE */

@media (max-width: 800px) {

    .login-page {
        flex-direction: column;
    }

    .left-side,
    .right-side {
        width: 100%;
    }

    .left-side {
        min-height: auto;
    }

    .right-side {
        min-height: auto;
    }

    .illustration {
        height: 160px;
    }
}

@media (max-width: 500px) {

    .left-side h1 {
        font-size: 23px;
    }

    .features {
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .feature {
        border: none;
    }

    .login-card {
        padding: 25px 20px;
    }
}
</style>
</head>


<body>

<div class="login-page">

    <!-- ==================================================
         LEFT SIDE
    =================================================== -->

    <div class="left-side">

        <div class="brand-icon">
            <i class="bi bi-people-fill"></i>
        </div>

        <h1>
            Employee Management<br>
            System
        </h1>

        <p class="description">
            Manage your team, track attendance,<br>
            handle payroll and more — all in one place.
        </p>


        <!-- Illustration -->

        <img
            src="{{ asset('image/login-illustration.png') }}"
            class="illustration"
            alt="Employee Management"
        >


        <!-- Features -->

        <div class="features">

            <div class="feature">

                <div class="feature-icon">
                    <i class="bi bi-people-fill"></i>
                </div>

                <span>
                    Employee<br>
                    Management
                </span>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    <i class="bi bi-calendar-check"></i>
                </div>

                <span>
                    Attendance<br>
                    Tracking
                </span>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    <i class="bi bi-currency-rupee"></i>
                </div>

                <span>
                    Payroll<br>
                    Management
                </span>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    <i class="bi bi-shield-check"></i>
                </div>

                <span>
                    Secure &<br>
                    Reliable
                </span>

            </div>

        </div>

    </div>


    <!-- ==================================================
         RIGHT SIDE
    =================================================== -->

    <div class="right-side">

        <div class="login-card">


            <!-- Login Header -->

            <div class="login-header">

                <div class="login-icon">
                    <i class="bi bi-people-fill"></i>
                </div>

                <h2>
                    Welcome 
                </h2>

                <p>
                    Login to your account
                </p>

            </div>


            <!-- Error -->

            @if ($errors->any())

                <div class="error">

                    @foreach ($errors->all() as $error)

                        <div>
                            <i class="bi bi-exclamation-circle"></i>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <!-- Login Form -->

            <form action="{{ route('login.submit') }}" method="POST">

                @csrf


                <!-- Email -->

                <div class="form-group">

                    <label>
                        Email
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                            autofocus
                        >

                    </div>

                </div>


                <!-- Password -->

                <div class="form-group">

                    <label>
                        Password
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-lock-fill input-icon"></i>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Enter your password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            id="togglePassword"
                        >
                            <i
                                class="bi bi-eye"
                                id="toggleIcon"
                            ></i>
                        </button>

                    </div>

                </div>


                <!-- Remember / Forgot -->

                <div class="login-options">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                        >

                        <span>
                            Remember me
                        </span>

                    </label>


                  

                </div>


                <!-- Login Button -->

                <button
                    type="submit"
                    class="login-btn"
                >
                    Login
                </button>

            </form>


            <!-- Footer -->

            <div class="login-footer">

                <span>
                    © Employee Management System
                </span>

            </div>

        </div>

    </div>

</div>


<!-- Password Show / Hide -->

<script>

    document
        .getElementById('togglePassword')
        .addEventListener('click', function () {

            const password =
                document.getElementById('password');

            const icon =
                document.getElementById('toggleIcon');


            if (password.type === 'password') {

                password.type = 'text';

                icon.classList.remove('bi-eye');

                icon.classList.add('bi-eye-slash');

            } else {

                password.type = 'password';

                icon.classList.remove('bi-eye-slash');

                icon.classList.add('bi-eye');

            }

        });

</script>

</body>
</html>