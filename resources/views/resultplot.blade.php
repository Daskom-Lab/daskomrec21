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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar-ex-admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin-main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/about.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/form-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script  src="{{ asset('/js/printtable.js') }}"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Fira+Code:wght@400&display=swap" rel="stylesheet">   
</head>
<body id="list-section">
<section id="nav-section">
    <nav class="navbar navbar-expand-lg dlor-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href=""><img src="{{asset('/assets/dlor.png')}}" alt="logo" class="dlor-logonav"></a>
          <div class="dlor-navright" id="dlor-toggler">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-center" href="/ListShift" tabindex="-1" aria-disabled="true"><img src="{{ asset('/assets/back-icon-admin.png') }}" alt="icon" width="40px" height="40px"></a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
</section> 
<section id="list-section">
<div class="container pb-5">
    <div class="pt-5 d-flex justify-content-center">
        <div class="checker-box">
          <div class="text-center text-nim-head">
            <span>Hasil Plot Rekrutmen Daskom Choose You</span>
          </div>
          <div class="text-center" style="background-color: #28d636;border-radius: 1rem;padding: 1rem 2rem 1rem 2rem;margin-top:1rem;">
            <span style="color:rgb(255, 255, 255);font-weight:700;font-size:28px">Total Jadwal : {{$countshift}}</span>
          </div>
          <div class="text-center" style="background-color: #cc4147;border-radius: 1rem;padding: 1rem 2rem 1rem 2rem;margin-top:1rem;">
            <span style="color:rgb(255, 255, 255);font-weight:700;font-size:28px">Total Caas Sudah pilih jadwal : {{$plot->count()}}</span>
          </div>
        </div>
      </div>
    <div class="p-3">
        <div class="card-body">
            <div class="d-flex justify-content-center pb-4">
              @if($ceklulus->isPlotRun==0)
                <div>
                    <a href="/ListShift"><button type="button" style="background-color: rgb(255, 80, 80)" class="button-submit-find">
                       Kembali 
                        </button></a>
                </div>
              @else
              @endif
                <div class="ms-2">
                <a href="/ResultPlot"><button type="button" class="button-submit-find">
                Refresh 
                </button></a>
                </div>
                <div style="float: right">

                </div>
            </div>
            @if($countshift!=0)
            <div class="text-center">
            <table id="plot-table" class="table table-bordered table-hover table-striped text-center align-middle">
                <thead>

                    <tr>
                        <th class="mobile-hide">No.</th>
                        <th class="mobile-hide">SHIFT</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th  class="mobile-hide">Kuota</th>
                        <th>LIST</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($shift as $p)
                    <tr>
                        <td class="mobile-hide">{{ $no++ }}</td>
                        <td class="mobile-hide">{{ $p->namashift }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->hari)->isoFormat('dddd, D MMMM Y') }}</td>
                        <td>{{ $p->jam_start }} - {{ $p->jam_end }} WIB</td>
                        <td  class="mobile-hide">{{ $p->kuota }}</td>
                        
                        <td style="background-color: #464645;padding:1rem 0.4rem 1rem 0.4rem;">
                        @foreach($plot as $a)
                        @if($a->shifts_id==$p->id)
                        <div>
                        <span style="color:rgb(247, 247, 247);font-size:1.1rem;letter-spacing:0.1rem;">{{$a->nim}}</span>
                        </div>
                        @else
                        @endif
                        @endforeach        
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              <div class="">{{ $shift->links('pagination::pagination') }}</div>
              </div>
          </div>
            @else
            <div class="text-center text-nim-head">
              <span>Belum ada Jadwal yang dibuat</span>
            </div>
            @endif
        </div>
    </div>
</div>
</section>
</body>
</html>