@extends('layout.cvmaster')

@section('content')
<style>
    body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background: #f4f4f4;
}

.container {
    max-width: 800px;
    margin: auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.name h1 {
    margin: 0;
}

.contact-info p {
    margin: 5px 0;
}

.initials h2 {
    background: #333;
    color: #fff;
    padding: 10px;
    margin: 0;
}

section {
    margin-bottom: 20px;
}

h2 {
    color: #333;
    margin-bottom: 10px;
}

h3 {
    margin: 0;
    color: #555;
}

p, ul {
    margin: 10px 0;
    padding-left: 20px;
}

ul {
    list-style-type: disc;
}

ul li {
    margin-bottom: 5px;
}

</style>

<div class="container">
    <div class="header" style="background-color: rgb(93, 92, 92); text-align: center; height: 180px;">
        <div class="name">
            <h1 style="color: white; font-family: 'Times New Roman', Times, serif; padding-top: 10px;">
                {{ $userResume->user->first_name }}
                <span id="firstName"></span>
                {{ $userResume->user->last_name }}
            </h1>
            <div class="contact-info">
                <p style="color: white;"><i class="fa-regular fa-envelope"></i>{{ $userResume->user->email }}</p>
              
            </div>
        </div>
    </div>

    <section class="summary">
        <h3>Summary Statement</h3>
        <hr>
        <p>{{ $userResume->cvInfos->where('field_name', 'summary')->first()->field_value ?? '' }}</p>
    </section>
    <hr>
    <section class="work-experience">
        <h3>Work Experience</h3>
        <hr>
        <div class="job">
            <h5>{{ $userResume->cvInfos->where('field_name', 'job_title')->first()->field_value ?? '' }}</h5>
            <p>{{ $userResume->cvInfos->where('field_name', 'experience_details')->first()->field_value ?? '' }}</p>
            <p>{{ $userResume->cvInfos->where('field_name', 'job_date')->first()->field_value ?? '' }}</p>
        </div>
    </section>
    <hr>
    <section class="core-qualifications">
        <h3>Core Qualifications</h3>
        <hr>
        <div id="qlist">
            @foreach ($userResume->cvInfos->where('field_name', 'qualification') as $cvInfo)
                <p>{{ $cvInfo->field_value }}</p>
            @endforeach
        </div>
    </section>
    <hr>
    <section class="education">
        <h3>Education</h3>
        <hr>
        <div class="school">
            <h5>{{ $userResume->cvInfos->where('field_name', 'university')->first()->field_value ?? '' }}</h5>
            <h5>{{ $userResume->cvInfos->where('field_name', 'graduation_year')->first()->field_value ?? '' }}</h5>
            <p>{{ $userResume->cvInfos->where('field_name', 'education_details')->first()->field_value ?? '' }}</p>
        </div>
    </section>
    <div class="download-button" id="downloadButton">
          <button class="btn btn-primary" onclick="downloadPDF()">Download PDF</button>
        </div>
</div>

<script>
          function downloadPDF() {
            const downloadButton = document.getElementById('downloadButton');
            downloadButton.style.display = 'none'; // Hide the download button

            const element = document.body;
            html2pdf(element, {
              margin: 1,
              filename: 'profile.pdf',
              image: {
                type: 'jpeg',
                quality: 0.98
              },
              html2canvas: {
                scale: 2
              },
              jsPDF: {
                unit: 'in',
                format: 'A4',
                orientation: 'portrait'
              }
            }).then(() => {
              downloadButton.style.display = 'block'; // Show the download button again
            });
          }
        </script>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
@endsection
