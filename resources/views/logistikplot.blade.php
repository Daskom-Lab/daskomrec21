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
<!-- Modal -->
<div class="modal fade" id="editpass" tabindex="-1" aria-labelledby="editpassLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-background">
        <div class="p-4 text-center">
          <span class="text-center rec-title">Ubah Password</span>
        </div>
        <div class="modal-body text-center">
            <form method="POST" action="\PassLogistik">
                @csrf
                @method('POST')
            <div class="pb-2">
                <input class="text-center text-area-fill" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="pb-2 text-center">
                <span style="color: rgb(196, 5, 5);font-size:1.1rem;font-weight:600;" class="text-center">Minimal 8 Karakter</span>
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
<section id="nav-section">
    <nav class="navbar navbar-expand-lg dlor-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href=""><img src="{{asset('/assets/dlor.png')}}" alt="logo" class="dlor-logonav"></a>
          <div class="dlor-navright" id="dlor-toggler">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a style="font-weight: 600;color: wheat;padding: 10px;" class="nav-link text-center" href="/logoutLogistik" tabindex="-1" aria-disabled="true">LOGOUT</a>
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
          <div class="text-center text-nim-head">
            <span>-Logistik-</span>
          </div>
          <div class="text-center pt-2 pb-3">
            <span style="color:rgb(19, 133, 19);font-weight:700;font-size:28px">Total Jadwal : {{$countshift}}</span>
          </div>
          <div class="d-flex justify-content-center pt-2">
            <button class="button-submit" type="submit" data-bs-toggle="modal" data-bs-target="#editpass">Ganti Password</button>
          </div>
          @error('password')
                <div class="text-center pt-1">
                  <span class="text-center" style="color: red;font-weight:600;font-size:20px">Untuk ganti Password, Minimal 8 Karakter</span>
                </div> 
        @enderror
        </div>
      </div>
    <div class="p-3">
        <div class="card-body">
            <div class="d-flex justify-content-center pb-4">
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
                        <td>{{ \Carbon\Carbon::parse($p->hari)->format('j F Y') }}</td>
                        <td>{{ $p->jam_start }} - {{ $p->jam_end }} WIB</td>
                        <td  class="mobile-hide">{{ $p->kuota }}</td>
                        
                        <td style="background-color: #feb224">
                        @foreach($plot as $a)
                        @if($a->shifts_id==$p->id)
                        <div>
                        <span style="font-display: italic;color:rgb(29, 29, 29);font-weight:600">{{$a->nim}}</span>
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
              <span>Belum ada Jadwal Plotingan yang dibuat</span>
            </div>
            @endif
        </div>
    </div>
</div>
</section>
</body>
</html>