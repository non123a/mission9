@extends('layout.master')

@section('content')
<style>
    .sidebar {
        background-color: rgb(137, 45, 45);
        color: white;
    }

    .name input {
        height: 65px;
        width: 100%;
        border-radius: 20px;
        border: none;
        background-color: rgb(206, 204, 204);
        padding: 15px;
        margin-bottom: 20px;
    }

    button {
        width: 130px;
        height: 45px;
        border: none;
        background-color: orange;
        color: white;
        font-family: 'Times New Roman', Times, serif;
        border-radius: 15px;
        font-size: 20px;
        font-weight: bold;
        display: block;
        margin: 5% auto 0 auto;
    }

    b {
        color: rgb(255, 167, 3);
    }

    textarea {
        border-radius: 20px;
        border: none;
        background-color: rgb(206, 204, 204);
        padding: 15px;
        height: 130px;
        width: 100%;
        margin-top: 20px;
    }

    .summary textarea {
        width: 100%;
        margin-top: 20px;
    }

    .profile-pic img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin: 10% auto;
        display: block;
    }

    .profile-pic input[type="file"] {
        display: none;
    }

    .upload-btn {
        display: inline-block;
        background-color: orange;
        color: white;
        padding: 10px 20px;
        border-radius: 20px;
        cursor: pointer;
        font-family: 'Times New Roman', Times, serif;
    }

    .upload-btn:hover {
        background-color: rgb(255, 167, 3);
    }

    .form-container {
        background-color: rgb(255, 255, 255);
        border: 2px solid rgb(137, 45, 45);
        padding: 20px;
        margin-bottom: 20px;
    }
    .up-but{
        text-align: center;
    }
</style>

<form id="headerForm" action="{{ route('store_cv_info') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_resume_id" value="{{ $user_resume_id }}">

    <div class="row">
        <div class="col-md-4 form-container">
            <h1 style="text-align: center; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Add your <b>photo</b></h1>
            <div class="profile-pic">
                @if ($user->profile_pic)
                    <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="Profile Picture">
                @else
                    <img src="camera.png" alt="Profile Picture">
                @endif
                <div class="up-but">
                    <!-- <label for="profile_pic" class="upload-btn">Choose Photo</label> -->
                </div>
                <input type="file" name="profile_pic" id="profile_pic" onchange="previewPhoto(event)">
                <button type="submit">Next</button>
            </div>
        </div>

        <div class="col-md-4 form-container">
            <h1 style="text-align: center; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Add your <b>info</b></h1>
            <div class="name">
                <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
            </div>
            <div class="name">
                <input type="text" name="address" id="address" placeholder="Address" required>
                <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" required>
            </div>
            <div class="name">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="text" name="start_end_date" id="start_end_date" placeholder="Start-End Date" required>
            </div>
            <div class="name">
                <input type="text" name="job_title" id="job_title" placeholder="Job Title" required>
                <input type="text" name="qualification" id="qualification" placeholder="Qualification" required>
            </div>
            <div class="name">
                <input type="text" name="university" id="university" placeholder="University" required>
                <input type="text" name="graduation_year" id="graduation_year" placeholder="Year of Graduation" required>
            </div>
            <div class="name">
                <input type="text" name="major" id="major" placeholder="Major" required>
            </div>
            <div class="expertise">
                <textarea id="languageInput" name="languages" placeholder="Languages (comma-separated)" required></textarea>
            </div>
        </div>

        <div class="col-md-4 form-container">
            <h1 style="text-align: center; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Add more <b>details</b></h1>
            <div class="summary">
                <textarea name="skills" id="skills" placeholder="Skills (comma-separated)" required></textarea>
            </div>
            <div class="summary">
                <textarea name="summary" id="summary" placeholder="Summary" required></textarea>
            </div>
            <div class="summary">
                <textarea name="education_details" id="education_details" placeholder="Additional Education Details" required></textarea>
            </div>
            <div class="summary">
                <textarea name="experience_details" id="experience_details" placeholder="Additional Experience Details" required></textarea>
            </div>
            <div class="summary">
                <textarea name="references" id="references" placeholder="References" required></textarea>
            </div>
        </div>
    </div>
    
</form>

<script>
    function previewPhoto(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('profilePicture');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
