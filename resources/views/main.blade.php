<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daskom Choose You</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/landing.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/reqruitment.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/about.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Fira+Code:wght@400&display=swap" rel="stylesheet">   
    
</head>
<body>
<section id="nav-section">
    <nav class="navbar navbar-expand-lg dlor-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href=""><img src="{{asset('/assets/dlor.png')}}" alt="logo" class="dlor-logonav"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#dlor-toggler">
            <img width="30px" height="30px" class="img-fluid" src="{{ asset('/assets/toogle.png') }}" alt="click">
          </button>
          <div class="dlor-navright collapse navbar-collapse" id="dlor-toggler">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="mobile-hide nav-item">
                RECRUITMENT DASKOM LABORATORY</li>
            </ul>
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-center" aria-current="page" href="#">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-center" href="#">RECRUITMENT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-center" href="#" tabindex="-1" aria-disabled="true">ABOUT</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</section>
<section id="landing-section">
  <div class="container p-lg-5">
    <div class="row">
      <div class="col-lg">
        <div class="d-flex justify-content-center">
          <img class="dlor-logoblue img-fluid" src="{{asset('/assets/dlor-blue.png')}}" alt="logo">
        </div>
      </div>
      <div class="col-lg">
        <div class="landing-text-p justify-content-center pt-lg-4 pt-sm-4">
          <div class="c-text-land-1">
            <span class="text-land-1">WELCOME STUDENT OF ELECTRICAL, PHYSICS, AND TELECOMUNICATION ENGINEERING.</span>
          </div>
          <div class="c-text-land-2">
            <span class="text-land-2">Welcome to Daskom Laboratory recruitment web. Don't forget to register yourself and be part of the daskom laboratory family.</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="rekrutmen-section">
  <div class="container">
    <div class="d-flex justify-content-center pt-4 pb-lg-5 pb-sm-3">
      <span class="req-h1-text">RECRUITMENT</span>
    </div>
    <div class="row">
      <div class="col-lg-4 pb-4">
        <div class="req-card">
          <div class="d-flex justify-content-center pt-4">
            <img class="req-img" src="{{ asset('/assets/dlor.png') }}" alt="1">
          </div>
          <div class="d-flex justify-content-center pb-4">
            <a class="a-req" href="http://bit.ly/DaskomChooseYou"><button class="req-button">DAFTAR</button></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 pb-4">
        <div class="req-card">
          <div class="d-flex justify-content-center pt-4">
            <img class="req-img" src="{{ asset('/assets/dlor.png') }}" alt="1">
          </div>
          <div class="d-flex justify-content-center pb-4">
            <a class="a-req" href="/checkyournim"><button class="req-button">CEK NIM</button></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 pb-sm-2">
        <div class="req-card">
          <div class="d-flex justify-content-center pt-4">
            <img class="req-img" src="{{ asset('/assets/dlor.png') }}" alt="1">
          </div>
          <div class="d-flex justify-content-center pb-4">
            <a class="a-req" href=""><button class="req-button">VISIT</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="daskom-section">
  <div class="container p-lg-5">
    <div class="row pt-sm-5 pb-5">
      <div class="col-lg">
        <div class="d-flex justify-content-center">
          <img class="daskom-logo img-fluid" src="{{asset('/assets/daskom.png')}}" alt="logo">
        </div>
      </div>
      <div class="col-lg">
        <div class="c-text-about-p justify-content-center pt-lg-4 pt-sm-4">
          <div class="c-text-about-1">
            <span class="text-about">Lab Dasar Komputer merupakan laboratorium di bawah naungan Fakultas Teknik Elektro yang memfasilitasi semua mahasiswa tingkat satu S1 Teknik Fisika, S1 Teknik Telekomunikasi, dan S1 Teknik Elektro untuk lebih memahami dan dapat mengaplikasikan secara langsung dasar dasar algoritma dan pemrograman menggunakan bahasa C </span>
          </div>
          <div class="d-flex pt-2">
            <div>
              <a href="https://www.instagram.com/telu.daskom/" target="_blank"><img class="social-icon" src="{{ asset('/assets/instagram.png') }}" alt="ig"></a>
            </div>
            <div>
              <a href="https://timeline.line.me/user/_dbhqzOurXL1CbjNxhYBPzSbYBVWZFDnFa5_ashs?utm_medium=windows&utm_source=desktop&utm_campaign=OA_Profile" target="_blank"><img class="social-icon" src="{{ asset('/assets/line.png') }}" alt="ig"></a>
            </div>
            <div>
              <a href="https://www.youtube.com/channel/UCgCAhA5CK3tG3pofQnn-VEA" target="_blank"><img class="social-icon" src="{{ asset('/assets/youtube.png') }}" alt="ig"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="footer">
<footer class="container">
<div class="d-flex justify-content-center">
  <div>
    <span>Created By Chef of Daskomlab</span>
  </div>
</div>
</footer>
</section>
</body>
</html>