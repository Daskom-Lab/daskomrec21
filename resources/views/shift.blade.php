<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daskom Choose You</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar-ex-admin.css') }}">
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
  <!-- Modal -->
  <div class="modal fade" id="CaasInput" tabindex="-1" aria-labelledby="CaasInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-background">
        <div class="p-4 text-center">
            <span class="text-center rec-title">Buat Shifts Baru</span>
        </div>
        <div class="modal-body  text-center">
        <form method="POST" action="\addShift">
                @csrf
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="date" name="hari" placeholder="tanggal" required>
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="time" name="jam" placeholder="jam" required>
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="number" name="kuota" placeholder="Kuota" required>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="button-cancel" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="button-submit">Simpan</button>
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
                    <a class="nav-link text-center" href="/adminHome" tabindex="-1" aria-disabled="true"><img src="{{ asset('/assets/back-icon.png') }}" alt="icon" width="40px" height="40px"></a>
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
            <span>SHIFT Daskom Choose You</span>
          </div>
          <div class="text-center pt-3 pb-3">
            <div>
                <a href=""><button type="submit" class="button-submit-find ms-1">Lihat Plottingan</button></a>
              </div>
          </div>
        </div>
      </div>
    <div class="p-3">
        <div class="card-body">
            <div class="d-flex justify-content-center pb-4">
                <div>
                    <button type="button" class="button-submit-find" data-bs-toggle="modal" data-bs-target="#CaasInput">Buat Shift Baru</button>
                </div>
                <div class="ms-2">
                <a href="/ListShift"><button type="button" class="button-submit-find">
                Refresh 
                </button></a>
                </div>
                <div style="float: right">

                </div>
            </div>
            <table class="table table-bordered table-hover table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Kuota</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shift as $p)
                    <tr>
                        <td>{{ $p->hari }}</td>
                        <td>{{ $p->jam }}</td>
                        <td>{{ $p->kuota }}</td>
                        <td>
                            <a href="/EditShift/"><button style="font-size: 1rem" class="button-submit-find">Edit</button></a>
                            <a href="/delShiftconfirm/" ><button class="button-cancel">Hapus</button></a>             
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
</body>
</html>