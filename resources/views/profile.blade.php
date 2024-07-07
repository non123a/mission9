@extends('layout.master')

@section('content')
<style>
    .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .profile-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 70%;
        max-width: 800px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-pic img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-top: 20px;
    }

    .profile-info {
        width: 100%;
        margin-top: 30px;
        text-align: left;
    }

    .info-field {
        margin-bottom: 15px;
    }

    .info-field label {
        display: block;
        color: #555;
        margin-bottom: 5px;
    }

    .info-field input {
        width: calc(100% - 16px);
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #fff;
    }

    .template-table {
        margin-top: 30px;
        width: 100%;
        border-collapse: collapse;
    }

    .template-table th, .template-table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    .template-table th {
        background-color: #f1f1f1;
    }

    .template-table td a {
        text-decoration: none;
        color: #007bff;
    }

    .template-table td a:hover {
        text-decoration: underline;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 20px;
        font-size: 14px;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #0056b3;
    }

    .upload-form {
        margin-top: 20px;
    }

    .upload-form input[type="file"] {
        display: inline-block;
        margin-right: 10px;
    }
</style>

<div class="center-container">
    <div class="profile-container">
        <div class="profile-pic">
            @if ($user->profile_pic)
                <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="Profile Picture">
            @else
                <p>No profile picture available.</p>
            @endif
        </div>
        <div class="profile-info">
            <div class="info-field">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" value="{{ $user->first_name }}" disabled>
            </div>
            <div class="info-field">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" value="{{ $user->last_name }}" disabled>
            </div>
            <div class="info-field">
                <label for="gender">Gender</label>
                <input type="text" id="gender" value="{{ $user->gender }}" disabled>
            </div>
            <div class="info-field">
                <label for="email">Email</label>
                <input type="text" id="email" value="{{ $user->email }}" disabled>
            </div>
        </div>

        <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" class="upload-form">
            @csrf
            <input type="file" name="profile_pic" accept="image/*">
            <button type="submit" class="button">{{ $user->profile_pic ? 'Upload New Profile Picture' : 'Upload Profile Picture' }}</button>
        </form>

        <div class="template-list">
            <h4>Your Templates</h4>
            <table class="template-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Template Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->resumes as $index => $resume)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>Template {{ $index + 1 }}: {{ $resume->template->tem_title }}</td>
                            <td><a href="{{ route('view_resume', ['user_resume_id' => $resume->user_resume_id]) }}">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
