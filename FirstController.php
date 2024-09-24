<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Registeration;
use App\Models\Otp;

use Illuminate\Support\Facades\Mail;

class FirstController extends Controller
{
    // Render the index page
    function index()
    {
        return view('/beforelogin/index');
    }

    // Handle user registration
    function register(Request $values)
    {
        // Validation rules
        $rules = [
            'username1' => [
                'unique:registeration,username',
                'required',
                function ($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL) && !preg_match('/^[0-9]{10}$/', $value)) {
                        $fail('The ' . $attribute . ' must be a valid email address or phone number.');
                    }
                }
            ],
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif',
            'newpassword' => [
                'required',
                'string',
                'min:8',             // Minimum length
                'regex:/[a-z]/',      // Must contain at least one lowercase letter
                'regex:/[A-Z]/',      // Must contain at least one uppercase letter
                'regex:/[0-9]/',      // Must contain at least one digit
                'regex:/[@$!%*#?&]/', // Must contain a special character
                'same:confirmpassword',
            ],
            'confirmpassword' => 'required',
            'first_name' => 'required|min:2|max:50',
            'surname1' => 'required|alpha|min:2|max:50',
            'gender' => 'required',
            'day' => 'required|min:1|max:31',
            'month' => 'required|min:1|max:12',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'hobbies' => 'required|array', // Ensure hobbies is an array
        ];

        // Validate the request data
        $validate = Validator::make($values->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Handle profile picture upload
        if ($values->hasFile('profile_picture')) {
            $image = $values->file('profile_picture');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $insert_Image = $imageName; // Save the image name
        } else {
            $insert_Image = 'default.png'; // Use default image if no file uploaded
        }

        // Store the registration data in the session
        session([
            'registerationData' => [
                'username' => $values['username1'],
                'password' => $values['newpassword'], // Ensure to hash if storing in DB
                'firstname' => $values['first_name'],
                'surname' => $values['surname1'],
                'dob' => $values['year'] . '-' . $values['month'] . '-' . $values['day'],
                'hobbies' => json_encode($values['hobbies']),
                'profile_picture' => $insert_Image // Save the image name, not the file
            ]
        ]);

        // Generate and save OTP
        $otp = rand(100000, 999999);
        $username = $values['username1'];
        Otp::create([
            'username' => $values['username1'],
            'otp' => $otp
        ]);
        $otpExpirationTime = now()->addMinutes(2); // 2 minutes from now
        session(['otp_expiration_time' => $otpExpirationTime->timestamp]); // Store as Unix timestamp

        // Send OTP via email or phone
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $data = array('otp' => $otp, 'username' => $username);
            Mail::send(['text' => 'registration_mail_blade'], ["data1" => $data], function ($message) use ($data) {
                $message->from('shivsagarkohar32@gmail.com', 'MeetUp');
                $message->to($data['username'])->subject('Registration OTP');
            });
        } else {
            ?>
            <script>
                alert('OTP is sent to your phone number');
            </script>
            <?php
        }

        // Redirect to OTP page
        return redirect()->to('/otp');
    }


    // Resend OTP
    function resend()
    {
        $values = session('registerationData');


        // Generate new OTP and send via email
        $otp = rand(100000, 999999);
        $username = $values['username'];

        $o = OTP::where('username', $username);

        $o->delete();

        $data = array('otp' => $otp, 'username' => $username);
        Mail::send(['text' => 'registration_mail_blade'], ["data1" => $data], function ($message) use ($data) {
            $message->from('skohar098@rku.ac.in', 'MeetUp');
            $message->to($data['username'])->subject('Verify OTP');
        });

        // Save the new OTP to the database
        Otp::create([
            'username' => $values['username'],
            'otp' => $otp
        ]);

        // Update the OTP expiration time in the session
        $otpExpirationTime = now()->addMinutes(2); // 2 minutes from now
        session(['otp_expiration_time' => $otpExpirationTime->timestamp]); // Store as Unix timestamp

        // Redirect to OTP page
        return redirect()->to('/otp');
    }


    // Render the OTP verification page
    function otp()
    {
        $opt = Otp::all();
        return view('beforelogin/verify', compact('opt'));
    }


    // Handle user login
    function loginKaro(Request $data)
    {
        // Validation rules
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
       

       // Validate the login data
        $validate = Validator::make($data->all(), $rules);
        if ($validate->fails()) {
            return redirect()->route("index")->withErrors($validate)->withInput();
        }

        // Check user credentials and log in
        $user = Registeration::where('username', $data['username'])->first();
        if ($user && Hash::check($data['password'], $user->password)) {
            Auth::login($user);
            session(['user' => $data['username']]);
            return redirect()->to('successlogin')->with('success', 'Login Successful');
        } else {
            return redirect()->route("index")->withErrors(['login' => 'Invalid credentials']);
        }
    }

    // Handle user logout
    function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    // Render the forgot account page
    function forgotAccount()
    {
        return view('/beforelogin/forgotAccount');
    }

    // Handle account recovery
    public function recovery(Request $data)
    {
        // Validate if the username exists in the registration table
        $exist = Validator::make(
            $data->all(),
            ['emailornumber' => 'required|exists:registeration,username']
        );

        if ($exist->fails()) {
            return redirect()->back()->withErrors($exist)->withInput();
        }

        $d = Registeration::where("username", $data['emailornumber'])->first();

        session(['registerationData' => ['username' => $data['emailornumber']]]);

        return view('/beforelogin/recovery', compact("d"));
    }

    // Reset password using username
    function reset()
    {
        $v = session('registerationData');
        $username = $v['username'];
        $user = Registeration::where("username", $username)->first();
        return view('beforelogin/options', compact("user"));
    }

    function reset_password(Request $request)
    {


        $rules = [
            'new_password' => [
                'required',
                'string',
                'min:8',             // Minimum length
                'regex:/[a-z]/',      // Must contain at least one lowercase letter
                'regex:/[A-Z]/',      // Must contain at least one uppercase letter
                'regex:/[0-9]/',      // Must contain at least one digit
                'regex:/[@$!%*#?&]/', // Must contain a special character
            ],
            'confirm_password' => ['required', 'same:new_password'],
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->route("reset")->withErrors($validate)->withInput();
        }

        $val = $request['new_password'];

        $v=session("registerationData");
        $username=$v['username'];

        echo $username;

        $user = Registeration::where("username", $username)->first();

        if($user)
        {
            $user->password = bcrypt($val);
            $user->save();

            return redirect()->route("index")->with("success", "Your password has been reset. Please login with your new password.");
        }

    



        
    }


    function resetPass()
    {
        return view("beforelogin/resetpassword");
    }





    function resetPassword(Request $request)
    {
        // Remove expired OTPs
        $expirationTime = now()->subMinutes(2);
        $expiredOtps = Otp::where('created_at', '<', $expirationTime)->get();
        foreach ($expiredOtps as $otp) {
            $otp->delete();
        }

        // Validate the submitted OTP
        $validate = Validator::make($request->all(), [
            'otp' => 'required|numeric|digits:6'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Retrieve the OTP record for the given OTP
        $opt = Otp::where('otp', $request->otp)->first();

        if (!$opt) {
            return redirect()->back()->with('error', 'Invalid OTP');
        }





        // Save user registration details in the database
        $values = session('registerationData');

        if (!isset($values['surname'])) {
            return view("beforelogin/resetpassword");
        }


        $insert = new Registeration();
        $insert->username = $values['username'];
        $insert->password = bcrypt($values['password']);
        $insert->firstname = $values['firstname'];
        $insert->lastname = $values['surname'];
        $insert->dob = $values['dob'];
        $insert->hobbies = $values['hobbies'];
        $insert->profile_picture = $values['profile_picture'];
        $insert->status = "Busy";

        if ($insert->save()) {
            return redirect('/')->with('success', 'Your account has been created, please login.');
        } else {
            return redirect('/')->with('error', 'Something went wrong, please fill out the information properly.');
        }



    }

}





    
