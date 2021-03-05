<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daskom Choose You 2021</title>
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
<body id="EditBackColor">
<!-- Modal Caas Input -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <section id="nav-section">
    <nav class="navbar navbar-expand-lg dlor-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href=""><img src="{{asset('/assets/dlor.png')}}" alt="logo" class="dlor-logonav"></a>
          <div class="dlor-navright" id="dlor-toggler">
            <ul class="navbar-nav">
              <li class="nav-item-logout">
                <a style="font-weight: 600;color: wheat;padding: 10px;" class="nav-link text-center" href="/logoutCaas" tabindex="-1" aria-disabled="true">LOGOUT</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</section>
<div class="modal-dialog modal-dialog-centered pt-4 pb-4">
      <div class="modal-background">
        <div class="p-4 pb-2 text-center">
            <span class="text-center rec-title">Pilih Jadwal</span>
        </div>
        <div class="modal-body  text-center">
            <form method="POST" action="createplot/{{$shift->id}}">
                @csrf
            <div class="pb-2">
                <label style="display: block" class="text-area-set">Nama :
                <input class="text-center text-area-fill" type="text" name="nama" value="{{ $caas->nama }}" disabled>
            </div>
            <div class="pb-2">
                <label style="display: block" class="text-area-set">NIM :
                <input class="text-center text-area-fill" type="text" name="nim" placeholder="NIM" value="{{ $caas->nim }}" disabled>
            </div>
            <div class="pb-2">
                <label style="display: block" class="text-area-set">Email :
                <input class="text-center text-area-fill" type="email" name="email" placeholder="Email" value="{{ $caas->email }}" disabled>
            </div>
            <label class="pb-2 text-area-set">Shift:</label>
                <input class="text-center text-area-fill" type="text" value="{{$shift->namashift}}" disabled>
                <div class="pb-2 pt-1">
                    <label style="display: block" class="text-area-set">Tanggal :
                    <input class="text-center text-area-fill" type="text" placeholder="tanggal" value="{{\Carbon\Carbon::parse($shift->hari)->format('j F Y')}}" disabled>
                </div>
                <div class="pb-2">
                    <label style="display: block" class="text-area-set">Waktu (WIB) :
                    <input class="text-center text-area-fill" type="text" value="{{$shift->jam_start}} - {{$shift->jam_end}}" placeholder="jam" disabled>
                </div>
            @if($limit>0)
            <div>
                <span style="color: red;font-weight:600;font-size:20px;">Sisa Kuota : {{$limit}}</span>
            </div>
            @else
            <div>
                <span style="color: red;font-weight:700;font-size:20px;">Kuota untuk plot ini sudah full, silahkan cari jadwal lain</span>
            </div>
            @endif
        </div>
        @if($limit>0)
        <div class="modal-footer d-flex justify-content-center">
            <a href="/listplot"><button type="button" class="button-cancel" data-bs-dismiss="modal">Batal</button></a>
            <button type="submit" class="button-submit">Pilih</button>
            </div>
        @else
        <div class="modal-footer d-flex justify-content-center">
            <a href="/listplot"><button type="button" class="button-cancel" data-bs-dismiss="modal">Kembali</button></a>
            </div>
        @endif
          </div>
        </form>
      </div>
</body>
</html>