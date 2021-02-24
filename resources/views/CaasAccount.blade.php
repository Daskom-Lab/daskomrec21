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
            <span class="text-center rec-title">Buat Akun CaAs</span>
        </div>
        <div class="modal-body  text-center">
            <form method="POST" action="\AddCaas">
                @csrf
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="text" name="nama" placeholder="Nama Lengkap CaAs" required>
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="text" name="nim" placeholder="NIM" required>
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="email" name="email" placeholder="Email" required>
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="password" name="password" placeholder="Password" required>
            </div>
            <div>
                <label for="isLolos">
                    <input class="form-check-input" style="padding: 2px" type="radio" name="isLolos" value="0" id="isLolos" required> Tidak Lolos
                    <input class="form-check-input" style="padding: 2px" type="radio" name="isLolos" value="1" id="isLolos" required> Lolos
                </label>
            </div>
            <div class="pt-2">
                <label for="urut_tahap">Tahap:</label>
                <select class="form-select-costum" id="urut_tahap" name="urut_tahap" required>
                @foreach($namatahap as $a)
                  <option name="urut_tahap" value="{{$a->id}}">{{$a->nama}}</option>
                @endforeach
                </select> 
            </div>
            
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="button-cancel" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="button-submit">Buat Akun</button>
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
            <span>Data Calon Asisten Daskom Choose You 2021</span>
          </div>
          <div class="text-center pt-3 pb-3">
            <div>
                <form action="/CariNIM" method="GET">
                <input autocomplete="off" class="form-style-find" type="text" id="find" name="find" alt="find" placeholder="Cari NIM..." required><button type="submit" class="button-submit-find ms-1">CARI</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    <div class="p-3">
        <div class="card-body">
            <div class="d-flex justify-content-center pb-4">
                <div>
                    <button type="button" class="button-submit-find" data-bs-toggle="modal" data-bs-target="#CaasInput">Input Akun CaAs</button>
                </div>
                <div class="ms-2">
                <a href="/CaasAccount"><button type="button" class="button-submit-find">
                Refresh 
                </button></a>
                </div>
                <div style="float: right">

                </div>
            </div>
            <table class="table table-bordered table-hover table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Tahap</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($caas as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->nim }}</td>
                        <td>{{ $p->email }}</td>
                        @if($p->isLolos==1)
                        <td>Lolos</td>
                        @else
                        <td>Tidak Lolos</td>
                        @endif
                        <td>{{ $p->urut_tahap }}</td>
                        <td>
                            <a href="/EditCaasAccount/{{ $p->datacaas_id }}"><button style="font-size: 1rem" class="button-submit-find">Edit</button></a>
                            <a href="/delcaasconfirm/{{ $p->datacaas_id }}" ><button class="button-cancel">Hapus</button></a>             
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