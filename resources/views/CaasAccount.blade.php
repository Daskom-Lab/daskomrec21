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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Fira+Code:wght@400&display=swap" rel="stylesheet">   
</head>
<body>
<!-- Modal Caas Input -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="CaasInput" tabindex="-1" aria-labelledby="CaasInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="CaasInputLabel">Input Akun CaAs</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body  text-center">
            <form method="POST" action="\AddCaas">
                @csrf
            <div class="pt-2 pb-2">
                <input class="text-center" type="text" name="nama" placeholder="Nama Lengkap CaAs">
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center" type="text" name="nim" placeholder="NIM">
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center" type="email" name="email" placeholder="Email">
            </div>
            <div class="pt-2 pb-2">
                <input class="text-center" type="password" name="password" placeholder="Password">
            </div>
            <div>
                <label for="isLolos">
                    <input style="padding: 2px" type="radio" name="isLolos" value="0" id="isLolos" selected> Tidak Lolos
                    <input style="padding: 2px" type="radio" name="isLolos" value="1" id="jisLolos"> Lolos
                </label>
            </div>
            <div class="pt-2">
                <label for="urut_tahap">Tahap:</label>
                <select id="urut_tahap" name="urut_tahap">
                  <option name="urut_tahap" value="1">Tes Tulis & Coding</option>
                  <option name="urut_tahap" value="2">Wawancara</option>
                  <option name="urut_tahap" value="3">Tucil</option>
                  <option name="urut_tahap" value="4">Teaching</option>
                  <option name="urut_tahap" value="5">Upgrading</option>
                </select> 
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  

    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Data Calon Asisten Laboratorium Dasar Komputer 2021
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CaasInput">
                    Input Akun CaAs
                </button>
                <br/>
                <br/>
                <table class="table table-bordered table-hover table-striped text-center">
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
                                <a href="/EditCaasAccount/{{ $p->datacaas_id }}" class="btn btn-warning">Edit</a>
                                <a href="/caas/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <ul class="pagination">
                <!-- Previous Page Link -->
                @if ($caas->onFirstPage())
                    <li class="disabled"><span><i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </span>{{$caas->currentPage()}}</li>
                @else
                    <li><a href="{{ $caas->previousPageUrl() }}" rel="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </a>{{$caas->currentPage()}}</li>
                @endif
            
                <!-- Next Page Link -->
                @if ($caas->hasMorePages())
                    <li><a href="{{ $caas->nextPageUrl() }}" rel="next">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a></li>
                @else
                    <li class="disabled"><span><i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </span></li>
                @endif
            </ul>
            Total Caas : {{$caas->total()}}
        </div>
    </div>
</body>
</html>