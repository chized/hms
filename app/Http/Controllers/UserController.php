<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\ValidationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    //Show Register
    public function create() {
        return view('users.register');
    }

    //Create new User
    public function store(Request $request){
        $formfields = $request->validate([
            /* 'name' => ['required', 'min:3'],
            'email'=> ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'] */
            'surname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'other_names' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:Male,Female'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        //Hash Password
        $formfields['password'] = bcrypt($formfields['password']);

        // Generate validation token
        $token = Str::random(40);
        $expirationTime = Carbon::now()->addHours(24);

       
        //$formfields['email_verification_token'] = $token;
        //$formfieds['email_verification_expires_at'] = $expirationTime;

        //Create User
        $user = User::create($formfields);

         // Save token and expiration time to the user instance
        $user->email_verification_token = $token;
        $user->email_verification_expires_at = $expirationTime;
        $user->save();

        // Build the validation link
        $validationLink = route('user.verifyEmail', [
            'token' => $token,
            'expiration' => $expirationTime->timestamp,
        ]);
        //Mail::to($user->email)->send(new ValidationEmail(['validationLink' => $validationLink]));
        Mail::to($user->email)->send(new ValidationEmail($validationLink));

        //login
        //auth()->login($user);
        // successfullyregistered
        return redirect()->route('registration.success')->with('message', 'User created and logged in Succesfully');
    }

    public function generateValidationLink()
    {
        // Generate a unique validation token
        $token = Str::random(40); // Generates a random string of 40 characters

        // Calculate expiration time for the validation link (e.g., 24 hours from now)
        $expirationTime = Carbon::now()->addHours(24); // Expiration time set to 24 hours from now

        // Save the token in the database
        $user = auth()->user(); // Assuming you're using Laravel's authentication system
        $user->email_verification_token = $token;
        $user->email_verification_expires_at = $expirationTime;
        $user->save();

        // Build the validation link
        $validationLink = route('email.validation', [
            'token' => $token,
            'expiration' => $expirationTime->timestamp, // Include expiration time as a Unix timestamp
        ]);

        // Return the validation link variable
        return $validationLink;
    }

    public function verifyEmail(Request $request)
    {
        $token = $request->token;
        $user_id = $request->user_id;

        // Retrieve the user from the database using the user ID
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }

        // Check if the token matches the user's email verification token
        if ($user->email_verification_token !== $token) {
            return redirect()->route('home')->with('error', 'Invalid verification token.');
        }

        // Check if the link has expired
        if (Carbon::now()->gt($user->email_verification_expires_at)) {
            return redirect()->route('home')->with('error', 'Verification link has expired.');
        }

        // Mark the user's email as verified
        $user->email_verified_at = now();
        $user->save();

        // Redirect the user to a success page or display a success message
        return redirect()->route('home')->with('success', 'Your email has been successfully verified.');
    }
    

     // app/Http/Controllers/Auth/RegisterController.php

     public function showRegistrationSuccess()
    {
        return view('users.registration_success');
     }


    //Logout user
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    //Show ogin form
    public function login() {
        return view('users.login');
    }

    //Aunthenticate and Login User
    public function authenticate(Request $request) {
        $formfields = $request->validate([
            'email' => ['required', 'email'], //Rule::unique('users', 'email'),
            'password' => 'required'
        ]);

        if(auth()->attempt($formfields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now succefully logged in');
        }

        return back()->withErrors(['email' => 'invalid Credentials']);
    }

    //Show forgot password form
    public function forgotPassword() {
        return view('users.forgot_pass');
    }
}

