<!-- Include the header template -->
@include('partials.header')

<style>
        .forgot-pass-container {
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

    input[type="email"]  {
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

        .button-container button {
            padding: 10px 15px;
        }
    
        }
    </style>
    <div class="forgot-pass-container">
        <!-- Display a form for the user to enter their email and request a password reset -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf <!-- CSRF protection -->

            <!-- Display an input field for the user's email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Display a button to submit the form -->
            <div  class="button-container">
                <button type="submit">Send Password Reset Link</button>
            </div>
        </form>
    </div>
<!-- Include the footer template -->
@include('partials.footer')