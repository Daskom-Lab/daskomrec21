<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daskom Choose You 2021</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Fira+Code:wght@400&display=swap" rel="stylesheet">   
</head>
<body>
<!-- Modal Caas Input -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="container text-center">
    <form method="POST" action="/UpdateCaasAccount/{{ $datacaas_id }}">
        @csrf
        @method('POST')
    <div class="pt-2 pb-2">
        <input class="text-center" type="text" name="nama" placeholder="Nama Lengkap CaAs" value="{{ $nama }}" disabled>
    </div>
    <div class="pt-2 pb-2">
        <input class="text-center" type="text" name="nim" placeholder="NIM" value="{{ $nim }}" disabled>
    </div>
    <div class="pt-2 pb-2">
        <input class="text-center" type="email" name="email" placeholder="Email" value="{{ $email }}" disabled>
    </div>
    <div>
        <label for="isLolos">
            <input style="padding: 2px" type="radio" name="isLolos" value="0" id="isLolos" selected> Tidak Lolos
            <input style="padding: 2px" type="radio" name="isLolos" value="1" id="isLolos"> Lolos
        </label>
    </div>
    <div class="pt-2">
        <label for="urut_tahap">Tahap:</label>
        <select id="urut_tahap" name="urut_tahap" value="{{ $urut_tahap }}">
            @foreach($namatahap as $a)
                <option name="urut_tahap" value="{{$a->id}}">{{$a->nama}}</option>
            @endforeach
        </select> 
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
</div>
</body>
</html>