<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daskom Choose You</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/favicon/favicon-16x16.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar-ex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/about.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/form-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Fira+Code:wght@400&display=swap" rel="stylesheet">   
</head>
<body id="list-section">

@include('layouts/navbarCaasLogout')
@section('navcaaslogout')
@endsection

<section id="list-section">
<div class="container pb-5">
    <div class="pt-5 pb-3 d-flex justify-content-center">
        <div style="background-color: #FFC844" class="checker-box">
          <div class="text-center text-nim-head">
            <span>YOUR RECRUITMENT SCHEDULE</span>
          </div>
          <div class="text-center pt-3 pb-3">
            <div class="pb-2">
                <span style="color: red;font-size:20px;font-weight:700;">You've chosen a recruitment schedule and your schedule can't be changed anymore, thank you</span>
            </div>
          @if($caas->isLolos==0)
          <div class="pt-3 pb-3" style="background-color: #cc4147;border-radius: 1rem;padding: 0 20px 0 20px;">
            <span style="color: rgb(219, 219, 219);font-size:25px;font-weight:700;">{{ $firstmeet->afterChoosePlot }}</span>
          </div>
          @else
          @endif
          <div class="pt-2">
              <span class="Welcome-text-semibold">{{$plots->namashift}}</span>
          </div>
          @if($caas->isLolos==1 && $firstmeet->isPlotFirstmeet==0)
            <div class="pt-2">
                <span class="Welcome-text-semibold">Date : {{\Carbon\Carbon::parse($plots->hari)->isoFormat('dddd, D MMMM Y')}}</span>
            </div>
          @else
          @endif
            <div class="pt-3">
                <span class="Welcome-text-semibold">Time : {{$plots->jam_start}} - {{$plots->jam_end}} WIB</span>
            </div>
            <div class="pt-4 text-center text-nim-head">
                <span style="color: rgb(5, 158, 5)">Semangat dan pantau terus informasi di OA Line Recruitment Daskom Laboratory untuk instruksi berikutnya.</span>
            </div>
            <div class="d-flex justify-content-center pt-2" >
              <div>
                <a href="https://www.instagram.com/telu.daskom/" target="_blank"><img class="social-icon mx-2" src="{{ asset('/assets/instagram.png') }}" alt="ig"></a>
              </div>
              <div class="">
                <a href="https://timeline.line.me/user/_dbhqzOurXL1CbjNxhYBPzSbYBVWZFDnFa5_ashs" target="_blank"><img class="social-icon mx-2" src="{{ asset('/assets/line.png') }}" alt="ig"></a>
              </div>
            </div>
          </div>
        </div>
        
    </div>
    <div class="d-flex justify-content-center pb-2">
        <a style="text-decoration: none" href="\home">
        <button style="background-color: #FF4E4E;color: whitesmoke;" class="home-button">
          <div class="menu-box-home">
          <div>
            KEMBALI
          </div>
          </div>
        </button>
        </a>
      </div>
</div>
</section>
</body>
</html>