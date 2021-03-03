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
        <div class="p-4 pb-2 text-center">
            <span class="text-center rec-title">Edit Shift</span>
        </div>
        <div class="modal-body  text-center">
            <form method="POST" action="/delShift/{{ $id }}">
                @csrf
                <label class="pb-2 text-area-set">Shift:</label>
                <input class="text-center text-area-fill" type="text" value="{{$namashift}}" disabled>
                <div class="pt-2 pb-2">
                    <label style="display: block" class="text-area-set">Tanggal :
                    <input class="text-center text-area-fill" type="text" placeholder="tanggal" value="{{\Carbon\Carbon::parse($hari)->format('j F Y')}}" disabled>
                </div>
                <div class="pt-2 pb-2">
                    <label style="display: block" class="text-area-set">Waktu :
                    <input class="text-center text-area-fill" type="text" value="{{$jam_start}} - {{$jam_end}}" placeholder="jam" disabled>
                </div>
                <div class="pt-2 pb-2">
                  <label style="display: block" class="text-area-set" >Kuota :  
                  <input class="text-center text-area-fill" type="text" value="{{$kuota}}" placeholder="Kuota" disabled>
                </div>
            
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <a href="/ListShift"><button type="button" class="button-submit" data-bs-dismiss="modal">Batal</button></a>
            <button type="submit" class="button-cancel">Hapus</button>
          </div>
        </form>
      </div>
    </div>
</body>
</html>