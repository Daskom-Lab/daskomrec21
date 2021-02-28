<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daskom Choose You 2021</title>
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
<body id="EditBackColor">
<!-- Modal Caas Input -->
<!-- Button trigger modal -->
  <!-- Modal -->
<div class="modal-dialog modal-dialog-centered shadow">
      <div class="modal-background">
        <div class="p-4 text-center">
            <span class="text-center rec-title">Pilih Jadwal</span>
        </div>
        <div class="modal-body  text-center">
            <form method="POST" action="createplot/{{$shift->id}}">
                @csrf
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="text" name="nama" value="{{ $caas->nama }}" disabled>
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="text" name="nim" placeholder="NIM" value="{{ $caas->nim }}" disabled>
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center text-area-fill" type="email" name="email" placeholder="Email" value="{{ $caas->email }}" disabled>
            </div>
            <div>
                <span style="color: black;font-weight:500;font-size:25px;">Tanggal : {{$shift->hari}}</span>
                <br>
                <span style="color: black;font-weight:500;font-size:25px;">Waktu : {{$shift->jam}}</span>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <a href="/listplot"><button type="button" class="button-cancel" data-bs-dismiss="modal">Batal</button></a>
            <button type="submit" class="button-submit">Update</button>
          </div>
        </form>
      </div>
    </div>
</body>
</html>