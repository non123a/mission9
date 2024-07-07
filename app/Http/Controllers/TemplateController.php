<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserResume; // Assuming you have a UserResume model
use App\Models\Category_User;
class TemplateController extends Controller
{
    // Method to display the template selection page
    public function index()
    {
        return view('template');
    }
        public function select(Request $request)
        {
            // Validate the form data
            $request->validate([
                'tem_id' => 'required|integer',
            ]);
        
            // Get the authenticated user's ID
            $userId = Auth::id();
        
            // Check if user exists
            $user = Category_User::find($userId);
            if (!$user) {
                return redirect()->back()->with('error', 'User not found or invalid user ID.');
            }
        
            // Create a new UserResume record
            $userResume = UserResume::create([
                'user_id' => $userId,
                'template_id' => $request->input('tem_id'),
            ]);
        
            switch ($request->input('tem_id')) {
                case 1:
                    return redirect()->route('input1', ['user_resume_id' => $userResume->user_resume_id])
                                     ->with('status', 'Template 1 selected successfully!');
                case 2:
                    return redirect()->route('input2', ['user_resume_id' => $userResume->user_resume_id])
                                     ->with('status', 'Template 2 selected successfully!');
                case 3:
                    return redirect()->route('input3', ['user_resume_id' => $userResume->user_resume_id])
                                     ->with('status', 'Template 3 selected successfully!');
                default:
                    return redirect()->back()->with('error', 'Invalid template selected.');
            }
        }



}
