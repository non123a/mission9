@extends('layout.master')

@section('content')

<style>
    img {
        width: 350px;
        margin-top: 40px;
        margin-left: 50px;
        border: 5px solid black;
        animation: fadeInUp 1s;
    }

    .sidebar {
        background-color: rgb(137, 45, 45);
        color: white;
    }

    .styled-link {
        width: 200px;
        height: 45px;
        text-decoration: none;
        color: rgb(255, 255, 255);
        border-radius: 30px;
        padding: 10px;
        text-align: center;
        font-weight: bold;
    }

    .orange {
        background: rgb(137, 45, 45);
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .animate-fade-in {
        animation: fadeIn 1s;
    }
</style>

<!-- Select-T -->
<div class="select">
    <h1 class="animate__animated animate__fadeInDown" style="text-align: center; font-weight: bold; font-family: 'Times New Roman', Times, serif; line-height: 40px; margin-top: 30px;">
        Select a template for <br> <b style="color: orange;">your design</b>
    </h1>
</div>
<hr style="width: 1100px; margin-left: 300px;">

<!-- Template -->

<div class="container animate-fade-in">
    <form action="{{ route('template.select') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm text-center">
                <label>
                    <input type="radio" name="tem_id" value="1">
                    <img src="tem1(2).png" alt="Template 1" class="img-thumbnail">
                </label>
            </div>
            <div class="col-sm text-center">
                <label>
                    <input type="radio" name="tem_id" value="2">
                    <img src="tem2(3).png" alt="Template 2" class="img-thumbnail">
                </label>
            </div>
            <div class="col-sm text-center">
                <label>
                    <input type="radio" name="tem_id" value="3">
                    <img src="tem3(2).png" alt="Template 3" class="img-thumbnail">
                </label>
            </div>
        </div>
        <hr style="width: 1100px; margin: 20px auto;">
        <div class="d-flex justify-content-center align-items-center gap-3">
            <button type="submit" class="btn btn-primary orange animate__animated animate__pulse animate__infinite">Select this template</button>
        </div>
    </form>
</div>

@stop
