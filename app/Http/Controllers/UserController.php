<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category_User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index(){
        return view("frontend.home");
    }

    public function master(){
        return view("layout.master");
    }

    public function indexBack(){
        return view("frontend.backend");
    }

    public function create(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string',
            'email' => 'required|string|email|max:255|unique:user,email',
            'password' => 'required|string|min:8',
        ], [
            'email.unique' => 'The email has already been used.'
        ]);

        if ($validator->fails()) {
            return redirect()->route('signup')
                ->withErrors($validator)
                ->withInput();
        }

        // Hash the password
        $hashedPassword = Hash::make($request->password);

        // Create user
        Category_User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);

        // Optionally, log the user in after successful registration
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        return redirect('index')->with('status', 'Account Created');
    }


    public function home(){
        return view('index');
    }

    
        public function showProfile()
    {
        $user = Auth::user()->load('resumes.template');

        return view('profile', compact('user'));
    }
    

    public function showLoginForm(){
        return view('login'); 
    }

    public function login(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Authentication passed
            return $this->authenticated($request, Auth::user());
        }

        // Authentication failed
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->email === 'root@admin.com') {
            
            return redirect()->route('admin.dashboard');
        }
        return redirect('/index'); // Default redirect for regular users
    }


    // Logout 
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home'); // Redirect to home or login page after logout
    }


    public function uploadProfilePicture(Request $request)
    {
        $request->validate([
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        $user = auth()->user(); // Assuming authentication is required
        $imageName = 'profile_' . time() . '.' . $request->profile_pic->extension();

        $request->profile_pic->move(public_path('storage'), $imageName);

        // Update user's profile picture in the database
        $user->profile_pic = $imageName;
        $user->save();

        return redirect()->back()->with('success', 'Profile picture updated successfully.');
    }
}