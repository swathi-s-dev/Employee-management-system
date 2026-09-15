<!DOCTYPE html>
<html>
<head>

    <title>@yield('title', 'Employee Management')</title>

    <style>
        
       /* ==============================
   FORM CONTAINER
============================== */

.form-container {
    width: 600px;
    margin: 30px auto;
    padding: 30px 40px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background: #ffffff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}


/* ==============================
   FORM FIELDS
============================== */

.form-container .form-group {
    margin-bottom: 22px;
}

.form-container .form-group > label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}

.form-container input[type="text"],
.form-container input[type="email"],
.form-container input[type="number"],
.form-container input[type="date"],
.form-container input[type="time"],
.form-container input[type="month"],
.form-container select,
.form-container textarea {
    width: 100%;
    height: 42px;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    background: #fff;
}

.form-container select {
    cursor: pointer;
}

.form-container input:focus,
.form-container select:focus,
.form-container textarea:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.25);
}


/* ==============================
   STATUS
============================== */

.form-container .status-options {
    display: flex;
    gap: 25px;
    align-items: center;
}

.form-container .status-option {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-weight: normal;
    margin: 0;
}

.form-container .status-option input[type="radio"] {
    width: auto;
    height: auto;
    margin: 0;
}


/* ==============================
   FORM BUTTONS
============================== */

.form-container .buttons {
    margin-top: 30px;
    display: flex;
    gap: 10px;
}

.form-container .save-button,
.form-container .cancel-button {
    min-width: 100px;
    padding: 10px 20px;
}
       .add-btn {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

       
        .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
       }

        .edit {
        color: green;
        font-size: 20px;
        text-decoration: none;
        margin-right: 10px;
        }

        .delete {
            color: red;
            font-size: 20px;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .status-active {
            color: green;
            font-weight: bold;
        }

        .status-inactive {
            color: red;
            font-weight: bold;
        }
        .status-present {
            color: green;
            font-weight: bold;
        }
        .status-absent {
            color: red;
            font-weight: bold;
        }
        .status-leave {
            color: blue;
            font-weight: bold;
        }
        .page-actions {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .page-actions a {
            text-decoration: none;
        }

        .back {
            display: inline-block;
            padding: 5px 10px;
            background: orange;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .save-button {
            padding: 5px 10px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .update-button {
            padding: 5px 10px;
            background: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .cancel-button {
            padding: 5px 10px;
            background: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        /* .back:hover,
        .btn:hover {
            background: #0056b3;
        } */

        /* .edit {
            text-decoration: none;
            font-size: 18px;
            margin-right: 10px;
        }

        .delete {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 18px;
        } */

        .status-active {
            color: green;
            font-weight: bold;
        }

        .status-inactive {
            color: red;
            font-weight: bold;
        }
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        /* MAIN BIG BOX */

        .main-container {
            width: 95%;
            margin: 30px auto;

            border: 2px solid #333;
            border-radius: 10px;

            background: white;

            overflow: hidden;
        }

        /* HEADER */

        .top-header {
            width: 100%;
            min-height: 120px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 20px 30px;

            border-bottom: 2px solid #333;
        }

        .top-header h1 {
            margin: 0 0 10px 0;
        }

        .top-header p {
            margin: 0;
        }

        /* LOGOUT */

        .logout-button {
            padding: 10px 20px;

            border: 1px solid #333;
            border-radius: 5px;

            background: rgb(16, 207, 128);

            cursor: pointer;
        }

        /* SIDEBAR + PAGE */

        .body-area {
            display: flex;
            width: 100%;
        }

        /* SIDEBAR */

        .sidebar {
            width: 220px;

            flex-shrink: 0;

            padding: 25px 15px;

            background: #f8f8f8;

            border-right: 2px solid #333;
        }

        .sidebar h2 {
            text-align: center;

            margin-top: 0;
            margin-bottom: 25px;
        }

        .sidebar a {
            display: block;

            width: 100%;

            padding: 12px 15px;

            margin-bottom: 10px;

            color: #333;

            text-decoration: none;

            border: 1px solid #ccc;
            border-radius: 5px;

            background: white;
        }

        .sidebar a:hover {
            background: #eeeeee;
        }

        /* PAGE CONTENT */

        .page-content {
            flex: 1;

            min-width: 0;

            padding: 30px;

            overflow-x: auto;
        }

        /* MOBILE */

        @media (max-width: 700px) {

            .main-container {
                width: 100%;
                margin: 0;
                border-radius: 0;
            }

            .top-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .body-area {
                display: block;
            }

            .sidebar {
                width: 100%;

                border-right: none;
                border-bottom: 2px solid #333;
            }

        }

    </style>

</head>

<body>

<div class="main-container">

    <!-- HEADER -->

    <div class="top-header">

        <div>

            <h1>
                Employee Management Dashboard
            </h1>

            <p>
                Welcome,
                <strong>{{ Auth::user()->name }}</strong>
            </p>

        </div>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="logout-button">
                Logout
            </button>

        </form>

    </div>


    <!-- SIDEBAR + CONTENT -->

    <div class="body-area">

        <!-- SIDEBAR -->

        <div class="sidebar">

            <h2>Menu</h2>

            <a href="{{ route('dashboard') }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('employees.index') }}">
                👥 Employees
            </a>

            <a href="{{ route('departments.index') }}">
                🏢 Departments
            </a>

            <a href="{{ route('attendances.index') }}">
                📅 Attendance
            </a>

            <a href="{{ route('payrolls.index') }}">
                💰 Payroll
            </a>

        </div>


        <!-- PAGE CONTENT -->

        <div class="page-content">

            @yield('content')

        </div>

    </div>

</div>

</body>
</html>