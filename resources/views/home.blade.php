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
  <!--Password change section-->
  <div class="modal fade" id="editpass" tabindex="-1" aria-labelledby="editpassLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-background">
        <div class="p-4 pb-1 text-center">
          <span class="text-center rec-title">Ubah Password</span>
        </div>
        <div class="modal-body text-center">
            <form method="POST" action="\PassCaas">
                @csrf
                @method('POST')
            <div class="pb-2">
                <input class="text-center text-area-fill @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required >
                @error('password')
                <div class="text-center pt-1">
                  <span class="text-center" style="color: red;font-weight:500;font-size:20px">password tidak boleh kosong dan minimal 8 karakter</span>
                </div> 
                @enderror
            </div>
            <div class="pb-2 text-center">
              <span style="color: rgb(196, 5, 5);font-size:1.2rem;font-weight:600;" class="text-center">Minimal Password 8 Karakter</span>
          </div>
            <div class="pb-2 text-center">
              <span style="color: rgb(196, 5, 5);font-size:1.3rem;font-weight:600;" class="text-center">Pastikan kamu ingat password barumu</span>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="button-cancel" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="button-submit">Ubah Password</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@include('layouts/navbarCaasLogout')
@section('navcaaslogout')
@endsection

<section id="main-nim">
    <div class="container p-5">
      <div class="d-flex justify-content-center">
        <div style="background-color: #FFB936" class="checker-box">
          <div class="text-center text-nim-head">
            <span>Daskom Choose You 2021</span>
          </div>
          <div class="text-center pt-3 pb-3">
            <div>
              <span style="font-weight: 600" class="uppercase Welcome-text">
              {{$caas->nama}}
              </span>
          </div>
          <div>
            <span style="font-weight: 700" class="Welcome-text">
              NIM : {{$caas->nim}}
            </span>
          </div>
          <div class="pt-4">
            <span class="tagline-home">
              #LoopingForever
            </span>
          </div>
          <div class="pt-2">
            <span class="tagline-home">
              #StartYourJourneyTakeYourGoldey
            </span>
          </div>
          @error('password')
                <div class="text-center pt-1">
                  <span class="text-center" style="color: red;font-weight:600;font-size:20px">ganti password gagal, password tidak boleh kosong dan minimal 8 karakter</span>
                </div> 
          @enderror
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center pt-3">
        <a style="text-decoration: none" href="\ceklulus">
        <button style="background-color: #67C0E0" class="home-button">
          <div class="menu-box-home">
          <div>
            Cek Kelulusan
          </div>
          </div>
        </button>
        </a>
      </div>
      @if($plotactive->isPlotActive==1 && $caas->isLolos==1)
      <div class="d-flex justify-content-center pt-3">
        <a style="text-decoration: none" href="\listplot">
        <button style="background-color: #4FF569" class="home-button">
          <div class="menu-box-home">
          <div>
            Jadwal Kamu
          </div>
          </div>
        </button>
        </a>
      </div>
      @else
      @endif
      <div class="d-flex justify-content-center pt-3">
        <button style="background-color: #FF4E4E;color: whitesmoke;" class="home-button" data-bs-toggle="modal" data-bs-target="#editpass">
          <div class="menu-box-home">
          <div>
            Ganti Password
          </div>
          </div>
        </button>
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