<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\FinalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TemplateController;
use App\Models\Category_User;
use App\Models\UserResume;

URL::forceScheme('https');

// Front-end
Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

// INPUT 1, INPUT 2, INPUT 3 Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/input1/{user_resume_id}', function ($user_resume_id) {
        $userResume = UserResume::find($user_resume_id);
        if (!$userResume) {
            abort(404);
        }
        $user = $userResume->user;
        return view('input1', ['user_resume_id' => $userResume->user_resume_id, 'user' => $user]);
    })->name('input1');

    Route::get('/input2/{user_resume_id}', function ($user_resume_id) {
        $userResume = UserResume::find($user_resume_id);
        if (!$userResume) {
            abort(404);
        }
        $user = $userResume->user;
        return view('input2', ['user_resume_id' => $userResume->user_resume_id, 'user' => $user]);
    })->name('input2');

    Route::get('/input3/{user_resume_id}', function ($user_resume_id) {
        $userResume = UserResume::find($user_resume_id);
        if (!$userResume) {
            abort(404);
        }
        $user = $userResume->user;
        return view('input3', ['user_resume_id' => $userResume->user_resume_id, 'user' => $user]);
    })->name('input3');

    Route::post('/store-cv-info', [ResumeController::class, 'storeCvInfo'])->name('store_cv_info');
    Route::get('/view-resume/{user_resume_id}', [ResumeController::class, 'viewResume'])->name('view_resume');
});

// Test Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::view('/input1', 'input1');
    Route::view('/input2', 'input2');
    Route::view('/input3', 'input3');
    Route::view('/template1', 'template1');
    Route::view('/template2', 'template2');
    Route::view('/template3', 'template3');
});

// Backend

// Login & Sign Up
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::view('/signup', 'signup')->name('signup');
Route::post('create_user', [UserController::class, 'create']);
Route::get('home', [UserController::class, 'home']);

// Profile (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [UserController::class, 'showProfile'])->name('profile.show');
    Route::post('/profile/upload', [UserController::class, 'uploadProfilePicture'])->name('profile.upload');
});

// Master script using Controller (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/home', [UserController::class, 'master']);
    Route::get('/back', [UserController::class, 'indexBack']);
});

// Template Control (Protected)
Route::middleware('auth')->group(function () {
    Route::get('template', [TemplateController::class, 'index'])->name('template');
    Route::post('template/select', [TemplateController::class, 'select'])->name('template.select');
});

// User CV information (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/create-cv', [ResumeController::class, 'showCreateForm'])->name('create_cv');
    Route::post('/store-cv', [ResumeController::class, 'storeCvInfo'])->name('store_cv_info');
    Route::get('/view-cv/{user_resume_id}', [ResumeController::class, 'viewResume'])->name('view_resume');
});

// Admin route (Protected by auth and admin middleware)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('backend/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('backend/user', [AdminController::class, 'user'])->name('user');
    Route::get('backend/{user_id}/edit', [AdminController::class, 'edit']);
    Route::get('backend/{user_id}/delete', [AdminController::class, 'delete']);
    Route::put('backend/{user_id}/edit', [AdminController::class, 'update']);
    Route::get('backend/template', [AdminController::class, 'template'])->name('template');
});
