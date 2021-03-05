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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Fira+Code:wght@400&display=swap" rel="stylesheet">   
</head>
<body id="EditBackColor">
<!-- Modal Caas Input -->
<!-- Button trigger modal -->
  <!-- Modal -->
<div class="modal-dialog modal-dialog-centered shadow">
      <div class="modal-background">
        <div class="p-4 text-center">
            <span style="color: rgb(247, 52, 52)" class="text-center rec-title">HAPUS AKUN CAAS</span>
        </div>
        <div class="modal-body  text-center">
            <form method="GET" action="/delcaas/{{ $datacaas_id }}">
                @csrf
            <div class="pt-1 pb-2">
                <input class="text-center text-area-fill" type="text" name="nama" value="{{ $nama }}" disabled>
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="text" name="nim" placeholder="NIM" value="{{ $nim }}" disabled>
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="email" name="email" placeholder="Email" value="{{ $email }}" disabled>
            </div>
            <div class="pt-2">
                @if($isLolos==1)
                <span style="color: green;font-weight:500;font-size:30px;">Lolos</span>
                @else
                <span style="color: red;font-weight:500;font-size:30px;">Tidak Lolos</span>
                @endif
            </div>
            <div class="pt-1">
                @if($urut_tahap==1)
                <span style="color: black;font-weight:500;font-size:20px;">Tahap : {{$namatahap->find(1)->nama}}</span>
                @elseif($urut_tahap==2)
                <span style="color: black;font-weight:500;font-size:20px;">Tahap : {{$namatahap->find(2)->nama}}</span>
                @elseif($urut_tahap==3)
                <span style="color: black;font-weight:500;font-size:20px;">Tahap : {{$namatahap->find(2)->nama}}</span>
                @elseif($urut_tahap==4)
                <span style="color: black;font-weight:500;font-size:20px;">Tahap : {{$namatahap->find(2)->nama}}</span>
                @elseif($urut_tahap==5)
                <span style="color: black;font-weight:500;font-size:20px;">Tahap : {{$namatahap->find(2)->nama}}</span>
                @else
                @endif
            </div>
            
        </div>
        @if($urut_tahap==$current_tahap || $isLolos==1)
        <div class="modal-footer">
            <div class="text-center">
            <span style="font-size: 25px;color:red">Akun CaAs tidak dapat dihapus, karena CaAs dalam tahap yang berlangsung atau status CaAs masih Lolos</span>
            <div class="pt-3 pb-2">
                <a href="/CaasAccount"><button type="button" class="button-cancel" data-bs-dismiss="modal">Kembali</button></a>
            </div>
            </div>
        </div>
        @else
        <div class="modal-footer d-flex justify-content-center">
            <a href="/CaasAccount"><button type="button" class="button-submit" data-bs-dismiss="modal">Batal</button></a>
            <button type="submit" class="button-cancel">Hapus</button>
          </div>
        @endif
        </form>
      </div>
    </div>
</body>
</html>