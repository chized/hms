
    @include('partials.header')
    <style>
        .login-container {
        width: 100%;
        max-width: 400px;
        margin: 10% auto; /* Center vertically and adjust margin-top for spacing */
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #3498db;
    }

    .form-group {
        margin-bottom: 15px;
        overflow: hidden; /* Ensure the input doesn't overflow its container */
    }

    .form-group label {
        display: block; /* Display labels as blocks */
        margin-bottom: 5px;  /* Add some space below labels */
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%; /* Make the input fields fill their container */
        padding: 8px; /* Add padding for better readability */
        box-sizing: border-box; /* Include padding and border in the element's total width and height */
    }

 

    /* Clear floats for smaller screens */
    @media (max-width: 767px) {
        .form-group {
            clear: both;
            width: 100%;
        }
    }

    .register,
    .forgot-password {
        margin-top: 10px;
        padding: 10px;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    .button-container button {
        padding: 10px 20px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Mobile-first responsive design */
    @media only screen and (max-width: 600px) {
        body {
            padding: 10px;
        }

        .login-container {
            margin: 10% auto;
            padding: 20px;
        }

        .form-group input {
            padding: 10px;
        }

        .register,
        .forgot-password {
            padding: 5px;
        }

        .button-container button {
            padding: 10px 15px;
        }
    
        }
    </style>
    <div class="login-container">
        <h2>Login</h2>

        <form method="POST" action="{{ route('authenticate') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>               
            
            <div >
                <a class="register" href="{{ route('register') }}">No account? Register</a>
                <a class="forgot-password" href="{{ route('forgot_password') }}">Forgot Password?</a>
            </div>

            <div class="button-container">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
