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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
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
                <a class="nav-link text-center" href="/" tabindex="-1" aria-disabled="true"><img class="hover-white" src="{{ asset('/assets/back-icon.png') }}" alt="icon" width="40px" height="40px"></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</section>
<section id="main-nim">
    <div class="container p-5 pt-2 pb-2">
      <div class="d-flex justify-content-center">
        <div class="checker-box">
          <div class="text-center text-nim-head">
            <span>Daskom Choose You 2021</span>
          </div>
          <div class="d-flex justify-content-center pt-3 pb-3">
            <form method="POST" action="/loginCaas">
              @csrf
            <div>
              <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" autocomplete="off" class="form-style" type="text" id="nim" name="nim" alt="NIM" placeholder="Input NIM Kamu" required >
            </div>
            <div class="pt-2">
              <input class="form-style" type="password" id="nim" name="password" alt="NIM" placeholder="Password" required>
            </div>
            @if (session('error'))
            <div class="text-center pt-1">
                        <span class="text-center" style="color: red;font-weight:600;font-size:20px">{{ session('error') }}</span>
            </div> 
            @endif
            @error('nim')
            <div class="text-center pt-1">
              <span class="text-center" style="color: red;font-weight:600;font-size:20px">NIM minimal 10 karakter</span>
            </div> 
            @enderror
            @error('password')
                <div class="text-center pt-1">
                  <span class="text-center" style="color: red;font-weight:600;font-size:20px">Password Minimal 8 Karakter</span>
                </div> 
            @enderror
            @if (session('changed'))
            <div class="text-center pt-1">
                        <span class="text-center" style="color: green;font-weight:500;font-size:20px">{{ session('changed') }}</span>
            </div> 
            @endif
            <div class="d-flex justify-content-center pt-3">
              <button class="form-style-submit" type="submit">Login</button>
            </div>
            </form>
          </div>
        </div>
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