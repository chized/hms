@include('partials.header')
<style>

      .form-container {
            width: 100%;
            max-width: 400px;
            margin: 10% auto; /* Center vertically and adjust margin-top for spacing */
            padding: 50px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

      .form-group {
            margin-bottom: 15px;
        }

             .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
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

        .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
            color: #4caf50;
        } 
    </style>
    <div class="form-container">
        <h2>Register</h2>

        <form method="POST" action="{{ route('store') }}">
            @csrf
       
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" required autofocus>
            </div>
           

           
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>
          

           
            <div class="form-group">
                <label for="other_names">Other names</label>
                <input type="text" name="other_names" id="other_names" required>
            </div>          

           
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
           

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            

          
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" required>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
     

            
            <div class="form-group">
                <label for="address">Contact Address</label>
                <input type="address" name="address" id="address" required>
            </div>          


            <div class="form-group">
                <label for="state">State</label>
                <select name="state" id="state" required>
                    <option value="Non-nigerian">Non-Nigerian</option>
                    <option value="Abia">Abia</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div class="button-container">
                <button type="submit">Register</button>
            </div>
        </form>

        <div class="login-link">
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
</body>
</html>
