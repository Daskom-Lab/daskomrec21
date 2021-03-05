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
        <div class="p-4 pb-2 text-center">
            <span class="text-center rec-title">Edit Shift</span>
        </div>
        <div class="modal-body  text-center">
            <form method="POST" action="/UpdateShift/{{ $id }}">
                @csrf
                <label class="pb-2 text-area-set" for="namashift">Tahap:</label>
                <select class="form-select-costum text-area-fill" id="namashift" name="namashift" value="{{$namashift}}">
                    <option name="namashift" value="SHIFT 1">SHIFT 1</option>
                    <option name="namashift" value="SHIFT 2">SHIFT 2</option>
                    <option name="namashift" value="SHIFT 3">SHIFT 3</option>
                    <option name="namashift" value="SHIFT 4">SHIFT 4</option>
                    <option name="namashift" value="SHIFT 5">SHIFT 5</option>
                    <option name="namashift" value="SHIFT 6">SHIFT 6</option>
                    <option name="namashift" value="SHIFT 7">SHIFT 7</option>
                </select> 
                <div class="pt-2 pb-2">
                    <label style="display: block" class="text-area-set" for="hari">Tanggal :
                    <input class="text-center text-area-fill" type="date" name="hari" placeholder="tanggal" value="{{$hari}}" required>
                </div>
                <div class="pt-2 pb-2">
                    <label style="display: block" class="text-area-set" for="jam_start">Waktu Mulai :
                    <input class="text-center text-area-fill" type="time" name="jam_start" value="{{$jam_start}}" placeholder="jam" required>
                </div>
                <div class="pt-2 pb-2">
                  <label style="display: block" class="text-area-set" for="jam_end">Waktu Selesai :
                  <input class="text-center text-area-fill" type="time" name="jam_end" value="{{$jam_end}}" placeholder="jam" required>
              </div>
                <div class="pt-2 pb-2">
                  <label style="display: block" class="text-area-set" for="kuota">Kuota :  
                  <input class="text-center text-area-fill" type="number" name="kuota" value="{{$kuota}}" placeholder="Kuota" required>
                </div>
            
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <a href="/ListShift"><button type="button" class="button-cancel" data-bs-dismiss="modal">Batal</button></a>
            <button type="submit" class="button-submit">Update</button>
          </div>
        </form>
      </div>
    </div>
</body>
</html>