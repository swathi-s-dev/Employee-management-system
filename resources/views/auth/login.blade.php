<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .login-container {
            width: 400px;
            margin: 80px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: white;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            border: none;
            background: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .error {
            margin-bottom: 15px;
            padding: 10px;
            background: #f8d7da;
            color: #721c24;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="login-container">

        <h1>Admin Login</h1>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter email"
                    required
                >
            </div>


            <div class="form-group">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >
            </div>


            <button type="submit" class="login-btn">
                Login
            </button>

        </form>

    </div>

</body>
</html>