<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daskom Choose You</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar-ex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/about.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
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
          <div class="dlor-navright" id="dlor-toggler">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a style="font-weight: 600;" class="nav-link text-center" href="/logoutCaas" tabindex="-1" aria-disabled="true">LOGOUT</a>
              </li>
          </ul>
            </ul>
          </div>
        </div>
      </nav>
</section>
<section id="main-nim">
  @if($Active==1)
    <div class="container p-5">
      <div class="d-flex justify-content-center">
        <div style="background-color:#FFB936" class="checker-box pb-5">
          <div class="text-center text-nim-head">
            <span>Apakah kamu lulus Tahap {{ $namatahap }}?</span>  
          </div>
          <div class="text-center pt-3 pb-3">
            <div>
              <span style="font-weight: 600" class="Welcome-text">
              Nama : {{$nama}}
              </span>
          </div>
          <div>
            <span style="font-weight: 700" class="Welcome-text">
              NIM : {{$nim}}
            </span>
          </div>
          @if($isLolos==1 && $urut_tahap==$current_tahap)
          <div class="pt-4">
            <span style="font-size:28px;font-weight: 700;color:green;" class="Welcome-text">
              {{$lulustext}}
            </span>
          </div>
          <div>
            @if($linktext!=NULL)
            <div class="d-flex justify-content-center pt-3">
              <a style="text-decoration: none" href="{{$linktext}}" target="_blank">
              <button style="background-color: #89ff90;color: black;border-radius:40px"  class="home-button">
                <div class="menu-box-home">
                <div>
                  CLICK THIS LINK
                </div>
                </div>
              </button>
              </a>
            </div>
            @endif
          </div>
          @else
          <div class="pt-3">
            <span style="font-weight: 700;color:red;" class="Welcome-text">
              {{$failedtext}}
            </span>
          </div>
          @endif
          </div>
        </div>
      </div>
      @if($isPlotActive==0 && $urut_tahap==$current_tahap && $isLolos==1)
      <div class="d-flex justify-content-center pt-3">
        <a style="text-decoration: none" href="\listplot">
        <button style="background-color: #414953;color: whitesmoke;"  class="home-button">
          <div class="menu-box-home">
          <div>
            PILIH JADWAL
          </div>
          </div>
        </button>
        </a>
      </div>
      @else
      @endif
      <div class="d-flex justify-content-center pt-3">
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
    @else
    <div class="container p-5">
      <div class="d-flex justify-content-center">
        <div style="background-color: #FFB936" class="checker-box">
          <div class="text-center text-nim-head">
            <span>Daskom Choose You 2021</span>  
          </div>
          <div class="text-center pt-3 pb-3">
          <div class="pb-2">
            <span style="font-size:30px;font-weight: 400;color:black;" class="Welcome-text">
              Nungguin pengumuman ya? hehehe ditunggu aja ya, kalian bakal dikasitau via instagram dan OA line untuk cek disini
            </span>
          </div>
          <div class="d-flex justify-content-center">
            <div>
              <a href="https://www.instagram.com/telu.daskom/" target="_blank"><img class="social-icon" src="{{ asset('/assets/instagram.png') }}" alt="ig"></a>
            </div>
            <div>
              <a href="https://timeline.line.me/user/_dbhqzOurXL1CbjNxhYBPzSbYBVWZFDnFa5_ashs?utm_medium=windows&utm_source=desktop&utm_campaign=OA_Profile" target="_blank"><img class="social-icon" src="{{ asset('/assets/line.png') }}" alt="ig"></a>
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center pt-3">
        <a style="text-decoration: none" href="\home">
        <button class="home-button">
          <div class="menu-box-home">
          <div>
            KEMBALI
          </div>
          </div>
        </button>
        </a>
      </div>
    </div>
    @endif
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