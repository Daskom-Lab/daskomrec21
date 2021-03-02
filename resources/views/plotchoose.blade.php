<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daskom Choose You</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/about.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/form-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">
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
                <li class="nav-item">
                    <a style="font-weight: 600;" class="nav-link text-center" href="/logoutCaas" tabindex="-1" aria-disabled="true">LOGOUT</a>
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
                <span style="color: red;font-size:25px;font-weight:700;">PERHATIAN, SETELAH PILIH JADWAL, TIDAK BISA UBAH JADWAL LAGI, TERIMA KASIH</span>
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
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shift as $p)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($p->hari)->format('j F Y') }}</td>
                        <td>{{ $p->jam }}</td>
                        <td>
                            <a href="takeplot/{{ $p->id }}"><button style="font-size: 1rem" class="button-submit-find">CEK SLOT</button></a>            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="pt-5 d-flex justify-content-center">
        <div class="checker-box">
          <div class="text-center text-nim-head">
            <span>JADWAL REKRUTMEN KAMU</span>
          </div>
          <div class="text-center pt-3 pb-3">
            <div class="pb-2">
                <span style="color: red;font-size:20px;font-weight:700;">Kamu sudah memilih jadwal rekrutmen, jadwal tidak dapat diubah lagi ya</span>
            </div>
            <div class="pt-2">
                <span style="color: black;font-size:30px;font-weight:700;">Tanggal : {{\Carbon\Carbon::parse($plots->hari)->format('j F Y')}}</span>
            </div>
            <div class="pt-3">
                <span style="color: black;font-size:30px;font-weight:700;">Jam : {{$plots->jam}}</span>
            </div>
            <div class="pt-4 text-center text-nim-head">
                <span style="color: rgb(5, 158, 5)">Semangat terus, pantau terus informasi di OA Line Rekrutmen ya</span>
            </div>
          </div>
        </div>
        
    </div>
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
    @endif
</div>
</section>
</body>
</html>