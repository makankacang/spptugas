@extends('layout.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


    <section class="section">
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#inputModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg> Input Data
        </button>
        <button type="button" class="btn btn-secondary mb-2" onclick="printAllData()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-print" viewBox="0 0 16 16">
                <path d="M4 1h8a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm8 10h2v2h-2v-2zm0-4h2v2h-2V7zm0-4h2v2h-2V3zm-10 6h6v6H2v-6z"/>
            </svg> Print All
        </button>
      
        <div class="row">

        @if ($message = Session::get('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function() {
            $('#success-alert').alert('close');
            }, 2000);
        </script>
        @endif

        @if ($message = Session::get('hapus'))
        <div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function() {
            $('#danger-alert').alert('close');
            }, 2000);
        </script>
        @endif

        @if ($message = Session::get('ubah'))
        <div id="info-alert" class="alert alert-info alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function() {
            $('#info-alert').alert('close');
            }, 2000);
        </script>
        @endif

          
            @foreach ($kelas as $index => $s)
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $s->nama_kelas }}</h5>
                            <h4>{{ $s->id_kelas }}</h4>
                            <h4>{{ $s->kompetensi_keahlian }}</h4>
                            <th>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $s->id_kelas }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button> |
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $s->id_kelas }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button>
                            </th>
                        </div>
                    </div>
                </div>

                @if(($index + 1) % 2 === 0)
                    <div class="w-100"></div> {{-- Pindah ke baris baru setelah 2 data --}}
                @endif
            @endforeach
        </div>
    </section>

    @foreach ($kelas as $s)
    <div class="modal fade" id="editModal{{ $s->id_kelas }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/kelasedit/{{ $s->id_kelas }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_kelas" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ $s->nama_kelas }}">
                        </div>
                        <div class="mb-3">
                            <label for="kompetensi_keahlian" class="form-label">Kompetensi Keahlian</label>
                            <input type="text" class="form-control" id="kompetensi_keahlian" name="kompetensi_keahlian" value="{{ $s->kompetensi_keahlian }}">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        @endforeach
        


        <div class="modal fade" id="inputModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Input Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/kelasinput" method="POST" onsubmit="return validateForm()">
                            @csrf
                            <div class="mb-3">
                                <label for="id_kelas" class="form-label">ID Kelas</label>
                                <input type="text" class="form-control" maxlength="5" id="id_kelas" name="id_kelas" value="" placeholder="Masukkan Nama Kelaas">
                            </div>
                            <div class="mb-3">
                                <label for="kompetensi_keahlian" class="form-label">Nama Kelas</label>
                                <input type="text" class="form-control" maxlength="10" id="nama_kelas" name="nama_kelas" value="" placeholder="Masukkan Nama Kelaas">
                            </div>
                            <div class="mb-3">
                                <label for="kompetensi_keahlian" class="form-label">Kompetensi Keahlian</label>
                                <input type="text" class="form-control" maxlength="50" id="kompetensi_keahlian" name="kompetensi_keahlian" value="" placeholder="Masukkan Kompetensi Keahlian">
                            </div>
        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
@foreach ($kelas as $s)
        <div class="modal fade" id="hapusModal{{ $s->id_kelas }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin Ingin Menghapus {{ $s->nama_kelas }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="/hapuskelas/{{ $s->id_kelas }}">
                            <button type="button" class="btn btn-danger">Ya</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    @endforeach
<script>
    function validateForm() {
      var id = document.getElementById("id").value;
      var nama = document.getElementById("nama").value;
  
      // Tambahkan kode validasi SweetAlert2 di sini
      if (id.trim() === '' || nama.trim() === '') {
        Swal.fire({
          position: 'middle',
          icon: 'error',
          title: 'Harap isi semua kolom',
          showConfirmButton: false,
          timer: 1500
        });
  
        return false;
      }
  
      return true;
    }

    function printAllData() {
        window.print();
    }
  </script>
@endsection


