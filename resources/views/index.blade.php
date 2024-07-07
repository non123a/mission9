@extends('layout.master')

@section('content')
<!-- Add AOS CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<!-- Custom CSS -->
<style>
    .first {
        background-color: #f8f9fa;
    }

    .first h1, .first p {
        transition: transform 0.3s, opacity 0.3s;
    }

    .first h1:hover, .first p:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }

    .second img, .third img {
        transition: transform 0.3s, opacity 0.3s;
    }

    .second img:hover, .third img:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }

    .btn-animate {
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-animate:hover {
        background-color: rgb(255, 140, 0);
        transform: scale(1.1);
    }
</style>

<!-- Row-1 -->
<div class="first">
    <div class="row">
        <!-- col-1 -->
        <div class="col justify-content-center text-start p-5" style="height: 400px;">
            <h1 data-aos="fade-right" style="font-family: 'Times New Roman', Times, serif; font-size: 60px; line-height: 50px; padding-left: 50px;">
                GOOD DESIGN <br><b>IS GOOD BUSINESS</b>
            </h1>
            <p data-aos="fade-left" style="font-family: 'Times New Roman', Times, serif; line-height: 35px; font-size: 28px; padding-bottom: 20px; padding-left: 50px;">
                Create your own CV in a minute to <br> apply to be a CEO
            </p>
            @if (Auth::check())
            <a href="{{ url('template') }}" class="btn-animate text-white text-decoration-none px-4 py-2 rounded-2 m-5" style="background-color: rgb(255, 166, 0);">
                Create Now
            </a>
            @else
            <a href="{{ route('login') }}" class="btn-animate text-white text-decoration-none px-4 py-2 rounded-2 m-5" style="background-color: rgb(255, 166, 0);">
                Create Now
            </a>
            @endif
        </div>
        <!-- col-2 -->
        <div class="col" style="height: 400px;">
            <img src="pic-front.png" class="rounded mx-auto d-block" data-aos="fade-up" style="height: 400px;">
        </div>
    </div>
</div>

<!-- Row-Choose -->
<div class="second" style="background-color: rgb(137, 45, 45);">
    <h2 class="text-center" data-aos="zoom-in" style="color: rgb(252, 186, 63); font-family: 'Times New Roman', Times, serif; padding-top: 2%;">
        <b>Choose Your Own Design</b>
    </h2>
    <h4 class="text-center" data-aos="zoom-in" style="color: white; font-family: 'Times New Roman', Times, serif; padding-bottom: 3%;">
        Wide selection of designs. Carefully optimised for clarity and impact. <br> One click layouts - no formatting required.
    </h4>
    <div class="row">
        <div class="col">
            <img src="pic1.webp" alt="" data-aos="flip-left" style="width: 100%;">
        </div>
        <div class="col">
            <img src="pic2.webp" alt="" data-aos="flip-right" style="width: 100%;">
        </div>
        <div class="col">
            <img src="pic3.jpg" alt="" data-aos="flip-left" style="width: 100%;">
        </div>
        <div class="col">
            <img src="pic4.png" alt="" data-aos="flip-right" style="width: 100%;">
        </div>
        <div class="col">
            <img src="pic5.jpg" alt="" data-aos="flip-left" style="width: 100%;">
        </div>
        <div class="col">
            <img src="pic7.jpg" alt="" data-aos="flip-right" style="width: 100%;">
        </div>
    </div>
</div>

<!-- Row-Offer -->
<div class="third">
    <h1 class="text-center" data-aos="fade-up" style="font-family: 'Times New Roman', Times, serif; font-weight: bold; color: orange; padding-top: 20px;">
        What We Offer
    </h1>
    <h3 class="text-center" data-aos="fade-up" style="font-family: 'Times New Roman', Times, serif;">
        Easiest and most feature-packed <br> CV builder available
    </h3>
    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col">
                <p data-aos="fade-right" style="font-weight: bold; font-size: 20px; font-family: 'Times New Roman', Times, serif; color: orange; padding-top: 20px;">
                    Step-by-step builder
                </p>
                <p data-aos="fade-right" style="font-family: 'Times New Roman', Times, serif; font-size: 18px;">
                    Easy to use step-by-step <br> builder enables you to <br> create a well-polished, <br> professional CV in <br> minutes. Impress, Save <br> time
                </p>
            </div>
            <div class="col">
                <p data-aos="fade-up" style="font-weight: bold; font-size: 20px; font-family: 'Times New Roman', Times, serif; color: orange; padding-top: 20px;">
                    Pre-written content
                </p>
                <p data-aos="fade-up" style="font-family: 'Times New Roman', Times, serif; font-size: 18px;">
                    Make your CV more <br> sophisticated. Select from <br> thousands of pre-written <br> bullet points for hundreds <br> of jobs and careers. Just <br> click and insert them <br> directly into your CV!
                </p>
            </div>
            <div class="col">
                <p data-aos="fade-left" style="font-weight: bold; font-size: 20px; font-family: 'Times New Roman', Times, serif; color: orange; padding-top: 20px;">
                    Expert tips & guidance
                </p>
                <p data-aos="fade-left" style="font-family: 'Times New Roman', Times, serif; font-size: 18px;">
                    Get detailed CV-building <br> tips and advice every step <br> of the way. CV pro or <br> beginner-we've got you <br> covered
                </p>
            </div>
        </div>
    </div>
    <hr>
    <!-- Row-feedback -->
    <h1 class="text-center" data-aos="fade-up" style="color: orange; font-family: 'Times New Roman', Times, serif;">
        Your feedback and review <br><b>important to us!</b>
    </h1>
    <p data-aos="fade-up" style="text-align: center; font-family: 'Times New Roman', Times, serif; font-size: 18px;">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi perspiciatis, atque porro quibusdam iure nobis dolorem sequi sit doloremque! Saepe eius <br> dolorem aut aliquam veritatis veniam similique soluta. Ab, aperiam.
    </p>

    <form>
        <div class="">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Write your comment" style="width: 280px; background-color: rgb(194, 193, 193); margin-left: 42%; text-align: center;">
        </div>
</div>

<!-- Row-footer -->
@include('layout.footer')
<!-- Row-footer end -->

<!-- Add AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init();
</script>
@stop
