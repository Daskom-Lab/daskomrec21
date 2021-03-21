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
    <div class="pt-5 d-flex justify-content-center">
        <div style="background-color: #FFB936" class="checker-box">
          <div class="text-center text-nim-head">
            <span>PILIH JADWAL REKRUTMEN</span>
          </div>
          <div class="text-center pt-3 pb-3">
            <div class="text-center">
              <span style="color: rgb(255, 43, 43);font-size:1.5rem;font-weight:700;">!!!PERHATIAN!!!</span>
            </div>
            <div style="background-color: #de960e;border-radius: 0.7rem;margin-top:0.6rem;">
                <span style="color: rgb(228, 228, 228);font-size:1.5rem;font-weight:700;">Setelah pilih jadwal, kalian tidak bisa ganti jadwal lagi</span>
            </div>
            <div style="background-color: #dc3545;border-radius: 0.7rem;margin-top:0.6rem;">
              <span style="color: rgb(226, 226, 226);font-size:1.5rem;font-weight:700;">Pastikan kalian yakin dengan jadwal yang kalian pilih</span>
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
                      <td>{{ \Carbon\Carbon::parse($p->hari)->isoFormat('dddd, D MMMM Y') }} WIB</td>
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
</div>
</section>
</body>
</html>