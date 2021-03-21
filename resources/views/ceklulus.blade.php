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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Fira+Code:wght@400&display=swap" rel="stylesheet">   
    
</head>
<body>

@include('layouts/navbarCaasLogout')
@section('navcaaslogout')
@endsection

<section id="main-nim">
  @if($Active==1)
    <div class="container p-5 pt-0">
      <div class="d-flex justify-content-center pb-4">
        <div>
          <img src="{{asset('/assets/dlor-blue.png')}}" alt="logo" class="dlor-logo-announce">
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <div style="background-color: #FFC844" class="checker-box pb-5">
          <div class="text-center text-nim-head">
            <span>Apakah kamu lulus Tahap {{ $namatahap }}?</span>  
          </div>
          <div class="text-center pt-3 pb-3">
            <div>
              <span style="font-weight: 600" class="uppercase Welcome-text">
              {{$nama}}
              </span>
          </div>
          <div>
            <span style="font-weight: 700" class="Welcome-text">
              NIM : {{$nim}}
            </span>
          </div>
          @if($isLolos==1 && $urut_tahap==$current_tahap)
          <div class="pt-4">
            <span style="font-size:25px;font-weight: 700;color:green;" class="Welcome-text">
              {{$lulustext}}
            </span>
          </div>
          <div>
            @if($linktext!='-')
            <div class="d-flex justify-content-center pt-3">
              <a style="text-decoration: none" href="{{$linktext}}" target="_blank">
              <button style="background-color: #26b758;color: wheat;border-radius: 20px;"  class="button-submit">
                <div>
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
      @if($isPlotActive==0 && $urut_tahap==$current_tahap && $isLolos==1 && $isPlotRun==1)
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
            <span style="font-size:20px;font-weight: 400;color:black;" class="Welcome-text">
              Belum ada Pengumuman nih, pantau terus ya Official Account Line Recruitment Daskom Laboratory, Semangat!
            </span>
          </div>
          <div class="d-flex justify-content-center">
            <div >
              <a href="https://www.instagram.com/telu.daskom/" target="_blank"><img class="social-icon mx-2" src="{{ asset('/assets/instagram.png') }}" alt="ig"></a>
            </div>
            <div>
              <a href="https://lin.ee/wvgpfvI" target="_blank"><img class="social-icon mx-2" src="{{ asset('/assets/line.png') }}" alt="ig"></a>
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

@include('layouts/about')
@section('aboutdaskom')
@endsection

@include('layouts/footer')
@section('footer')
@endsection

</body>
</html>