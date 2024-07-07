@extends('layout.cvmaster')

@section('content')

<style>
    body {
        font-family: "Lexend", sans-serif;
        width: 210mm;
        height: 297mm;
        margin: 0 auto;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .profile-img {
        width: 193px;
        height: 193px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto;
        display: block;
        border: 4px solid rgb(255, 255, 255);
    }

    .section-title {
        font-weight: bold;
        text-transform: uppercase;
    }

    .sidebar {
        background-color: rgb(137, 45, 45);
        color: white;
        padding: 20px;
        height: 100%;
        width: auto;
    }

    .main-content {
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 10px;
        flex-grow: 1;
    }

    .title-underline {
        width: 100%;
        height: 1px;
        background-color: #343a40;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .title-underline-white {
        width: 100%;
        height: 1px;
        background-color: #ffffff;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    h6 {
        font-size: 20px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .container-flex {
        display: flex;
        gap: 0;
    }

    ul {
        padding-left: 20px;
    }

    li {
        list-style-type: disc;
    }

    .download-button {
        display: block;
        margin: 20px auto;
        text-align: center;
    }

    @media print {
        .download-button {
            display: none;
        }
    }
</style>
<div class="container mt-5">
    <div class="row container-flex">
        <div class="col-md-4 p-0">
            <div class="sidebar">
                <div class="text-center">
                @if ($userResume->user->profile_pic)
                    <img src="{{ asset('storage/' . $userResume->user->profile_pic) }}" alt="Profile Picture" class="profile-img" />
                @else
                    <p>No profile picture available.</p>
                @endif

                </div>
                <!-- Contact Info -->
                <div class="title-underline-white"></div>
                <div class="contact-info mt-1">
                    <h5>CONTACT</h5>
                    <div class="title-underline-white"></div>
                    <!-- Display phone_number and address from UserCvInfo -->
                    @foreach ($userResume->cvInfos as $cvInfo)
                        @if ($cvInfo->field_name === 'phone_number')
                            <p><i class="fa fa-phone"></i> {{ $cvInfo->field_value }}</p>
                        @endif
                        @if ($cvInfo->field_name === 'email')
                            <p><i class="fa fa-envelope"></i> {{ $cvInfo->field_value }}</p>
                        @endif
                        @if ($cvInfo->field_name === 'address')
                            <p><i class="fa fa-map-marker"></i> {{ $cvInfo->field_value }}</p>
                        @endif
                    @endforeach
                </div>

                <!-- Loop through all fields in UserCvInfo -->
                @foreach ($userResume->cvInfos as $cvInfo)
                    @if (in_array($cvInfo->field_name, ['skills', 'languages']))
                        <div class="other-info mt-4">
                            <div class="title-underline-white"></div>
                            <h5>{{ strtoupper($cvInfo->field_name) }}</h5>
                            <div class="title-underline-white"></div>
                            <!-- Display skills and languages as a list -->
                            <ul>
                                @foreach (explode(',', $cvInfo->field_value) as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-8 p-0">
            <div class="main-content mt-">
                <!-- name -->
                <div style="display: flex;">
                    @foreach ($userResume->cvInfos as $cvInfo)
                        @if ($cvInfo->field_name === 'first_name')
                            <h1> 
                             <span id="firstName">{{ $cvInfo->field_value }}</span>
                            </h1>
                        @endif
                        @if ($cvInfo->field_name === 'last_name')
                            <h1>
                             <span id="firstName">{{ $cvInfo->field_value }}</span>
                            </h1>
                        @endif
                    @endforeach
                </div>
                <!-- <h3>{{ $userResume->cvInfos->where('field_name', 'job_title')->first()->field_value ?? '' }}</h3> -->
                <div>


                    <!-- WOrk exp 2.0 -->
                    <div class="title-underline"></div>
                    <h5 class="section-title">Work Experience</h5>
                    <div class="title-underline"></div>
                    <h6>{{ $userResume->cvInfos->where('field_name', 'job_title')->first()->field_value ?? '' }}</h6>
                    <h6>{{ $userResume->cvInfos->where('field_name', 'qualification')->first()->field_value ?? '' }}</h6>

                    <!-- education -->
                    <div class="title-underline"></div>
                    <h5 class="section-title">Education</h5>
                    <div class="title-underline"></div>
                    <h6>{{ $userResume->cvInfos->where('field_name', 'university')->first()->field_value ?? '' }}</h6>
                    <h6>{{ $userResume->cvInfos->where('field_name', 'qualification')->first()->field_value ?? '' }}</h6>
                    <h6>{{ $userResume->cvInfos->where('field_name', 'major')->first()->field_value ?? '' }}</h6>
                    <h6>{{ $userResume->cvInfos->where('field_name', 'graduation_year')->first()->field_value ?? '' }}</h6>
                    @foreach ($userResume->cvInfos->where('field_name', 'education_details') as $cvInfo)
                        <p>{{ $cvInfo->field_value }}</p>
                    @endforeach

                    <!-- summary -->
                    <div class="title-underline"></div>
                    <h5 class="section-title">Summary</h5>
                    <div class="title-underline"></div>
                    <p>{{ $userResume->cvInfos->where('field_name', 'summary')->first()->field_value ?? '' }}</p>

                    <!-- references -->
                    <div class="title-underline"></div>
                    <h5 class="section-title">References</h5>
                    <div class="title-underline"></div>
                    <ul>
                        @foreach ($userResume->cvInfos->where('field_name', 'references') as $cvInfo)
                            <li>{{ $cvInfo->field_value }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="download-button">
    <button onclick="downloadPDF()">Download PDF</button>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script>
    function downloadPDF() {
        const downloadButton = document.querySelector('.download-button');
        downloadButton.style.display = 'none';
        
        const element = document.body;
        html2canvas(element).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const doc = new jsPDF('p', 'mm', 'a4');
            const imgWidth = 210;
            const pageHeight = 297;
            const imgHeight = canvas.height * imgWidth / canvas.width;
            let heightLeft = imgHeight;
            let position = 0;

            doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;

            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                doc.addPage();
                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
            }
            doc.save('resume.pdf');
            downloadButton.style.display = 'block';
        });
    }
</script>
@endsection
