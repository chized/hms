<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px;
            padding: 20px;
            border: 2px solid #3498db; /* Blue border color */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .button-link {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            background-color: #3498db; /* Blue background color */
            color: #fff; /* White text color */
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .button-link:hover {
            background-color: #2980b9; /* Darker blue on hover */
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Registration Successful!</h1>

        <p>
            Thank you for registering! To activate your account, please check your email and follow the instructions to verify your email address.
        </p>

        <p>
            Once you've verified your email, you can log in to your account.
        </p>

        <p>
            <a class="button-link" href="{{ route('home') }}">Go back to the home page</a>
            <a class="button-link" href="{{ route('login') }}">Login</a>
            <a class="button-link" href="{{ route('verification.resend') }}">Resend Activation Link</a>
        </p>
    </div>

    <!-- Include the JavaScript script -->
    <script src="{{ asset('js/showSuccessMessage.js') }}"></script>

</body>
</html>
