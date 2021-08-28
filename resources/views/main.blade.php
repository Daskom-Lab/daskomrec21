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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/landing.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/reqruitment.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/about.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Fira+Code:wght@400&display=swap" rel="stylesheet">   
    
</head>
<body style="background-color: #fceed4">
<section id="nav-section">
    <nav class="navbar navbar-expand-lg dlor-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href=""><img src="{{asset('/assets/dlor.png')}}" alt="logo" class="dlor-logonav"></a>
          
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="mobile-hide nav-item">
                <span style="font-size: 20px">RECRUITMENT DASKOM LABORATORY</span></li>
            </ul>
            <div class="dlor-navright" id="dlor-toggler">
            <ul class="navbar-nav">
              <li class="nav-item-login">
                <a style="font-weight: 400;" class="nav-link text-center" href="/login" tabindex="-1" aria-disabled="true">LOGIN</a>
              </li>
            </ul>
            </div>
        </div>
      </nav>
</section>

<section id="landing-section">
  <div class="container p-lg-5">
    <div class="row pb-5">
      <div class="col-lg">
        <div class="d-flex justify-content-center">
          <img class="dlor-logoblue img-fluid" src="{{asset('/assets/dlor-blue.png')}}" alt="logo">
        </div>
      </div>
      <div class="col-lg">
        <div class="landing-text-p justify-content-center pt-lg-4 pt-sm-4">
          <div class="c-text-land-1">
            <span class="text-land-1">WELCOME ALL OF ELECTRICAL, PHYSICS, AND TELECOMMUNICATION ENGINEERING STUDENTS.</span>
          </div>
          <div class="c-text-land-2">
            <span class="text-land-2">Welcome to Daskom Laboratory recruitment web. Don't forget to register yourself and be part of the daskom laboratory family.</span>
          </div>
          <div class="c-text-land-2">
            <span class="text-land-2 tagline">#StartYourJourneyTakeYourGoldey</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="rekrutmen-section">
  <div class="container">
    <div class="d-flex justify-content-center pt-5 pb-lg-3 pb-sm-3 text-center">
      <span class="req-h1-text">RECRUITMENT 2022 IS COMING SOON</span>
    </div>
  </div>
</section>

@include('layouts/about')
@section('aboutdaskom')
@endsection

@include('layouts/footer')
@section('footer')
@endsection

</body>
</html>