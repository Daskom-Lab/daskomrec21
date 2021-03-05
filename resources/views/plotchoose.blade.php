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
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Fira+Code:wght@400&display=swap" rel="stylesheet">   
</head>
<body id="list-section">
<!-- Modal Caas Input -->
<!-- Button trigger modal -->
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
<section id="list-section">
<div class="container pb-5">
    @if($plotactive->isPlotActive==0)
    <div class="pt-5 d-flex justify-content-center">
        <div style="background-color: #FFB936" class="checker-box">
          <div class="text-center text-nim-head">
            <span>PILIH JADWAL REKRUTMEN</span>
          </div>
          <div class="text-center pt-3 pb-3">
            <div>
                <span style="color: red;font-size:20px;font-weight:700;">!!!PERHATIAN!!!, SETELAH PILIH JADWAL, JADWAL TIDAK BISA DIUBAH LAGI, TERIMA KASIH</span>
            </div>
            <div>
              <span style="color: red;font-size:15px;font-weight:700;">Pastikan kalian yakin dengan jadwal yang kalian pilih.</span>
          </div>
          </div>
        </div>
      </div>
    <div class="p-3">
        <div class="card-body">
            <div class="d-flex justify-content-center pb-4">
                <div class="ms-2">
                    <a href="/ceklulus"><button style="background-color:#FF4E4E;" type="button" class="button-submit-find">
                    Kembali 
                    </button></a>
                    </div>
                <div class="ms-2">
                <a href="/listplot"><button type="button" class="button-submit-find">
                Refresh 
                </button></a>
                </div>
            </div>
            <table class="table table-bordered table-hover table-striped text-center align-middle">
                <thead>
                    <tr>
                      <th class="mobile-hide">No.</th>
                      <th>SHIFT</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                    @foreach($shift as $p)
                    <tr>
                      <td class="mobile-hide">{{ $no++ }}</td>
                      <td>{{ $p->namashift }}</td>
                      <td>{{ \Carbon\Carbon::parse($p->hari)->format('j F Y') }} WIB</td>
                      <td>{{ $p->jam_start }} - {{ $p->jam_end }} WIB</td>
                        <td>
                            <a href="takeplot/{{ $p->id }}"><button style="font-size: 0.9rem" class="button-submit-find">CEK SLOT</button></a>            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              <div class="">{{ $shift->links('pagination::pagination') }}</div>
            </div>
        </div>
    </div>
    @else
    <div class="pt-5 pb-3 d-flex justify-content-center">
        <div style="background-color: #FFC844" class="checker-box">
          <div class="text-center text-nim-head">
            <span>YOUR RECRUITMENT SCHEDULE</span>
          </div>
          <div class="text-center pt-3 pb-3">
            <div class="pb-2">
                <span style="color: red;font-size:20px;font-weight:700;">You've chosen a recruitment schedule and your schedule can't be changed anymore, thank you</span>
            </div>
            <div class="pt-2">
              <span class="Welcome-text-semibold">{{$plots->namashift}}</span>
          </div>
            <div class="pt-2">
                <span class="Welcome-text-semibold">Date : {{\Carbon\Carbon::parse($plots->hari)->format('j F Y')}}</span>
            </div>
            <div class="pt-3">
                <span class="Welcome-text-semibold">Time : {{$plots->jam_start}} - {{$plots->jam_end}} WIB</span>
            </div>
            <div class="pt-4 text-center text-nim-head">
                <span style="color: rgb(5, 158, 5)">Semangat terus dan pantau terus informasi di OA Line Recruitment Daskom Laboratory untuk instruksi berikutnya.</span>
            </div>
            <div class="d-flex justify-content-center pt-2" >
              <div>
                <a href="https://www.instagram.com/telu.daskom/" target="_blank"><img class="social-icon mx-2" src="{{ asset('/assets/instagram.png') }}" alt="ig"></a>
              </div>
              <div class="">
                <a href="https://lin.ee/wvgpfvI" target="_blank"><img class="social-icon mx-2" src="{{ asset('/assets/line.png') }}" alt="ig"></a>
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
    @endif
</div>
</section>
</body>
</html>