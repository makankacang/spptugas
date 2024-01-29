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

          
            @foreach ($siswa as $index => $s)
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $s->nama }}</h5>
                            <h4>{{ $s->nis }}</h4>
                            <h4>{{ $s->alamat }}</h4>
                            <h4>{{ $s->no_telp }}</h4>
                            <th>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $s->nisn }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button> |
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $s->nisn }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button> |
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#sppModal{{ $s->nisn }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="SPP">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="19" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
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

    @foreach ($siswa as $s)
    <div class="modal fade" id="editModal{{ $s->nisn }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/siswaedit/{{ $s->nisn }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $s->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nis</label>
                            <input type="text" class="form-control" id="nis" name="nis" value="{{ $s->nis }}">
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <div class="form-group">
                                <select class="form-control" id="dropdownInput" name="idc">
                                    <option value="{{ $s->kelas->id_kelas }}">{{ $s->kelas->nama_kelas }}</option>
                                    @foreach ($kelas as $index => $k)
                                        <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $s->alamat }}">
                        </div>
                        <div class="mb-3">
                            <label for="nohp" class="form-label">No. HP</label>
                            <input type="text" maxlength="15" class="form-control" id="nohp" name="no_telp" value="{{ $s->no_telp }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
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

    <div class="modal fade" id="confirmationModal{{ $s->nisn }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Edit successful!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

        @endforeach



    @foreach ($siswa as $s)
    <div class="modal fade" id="sppModal{{ $s->nisn }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">SPP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/sppedit/{{ $s->sppp->id_spp }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="idspp" class="form-label">ID SPP</label>
                            <h5 class="card-title">{{ $s->sppp->id_spp }}</h5>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <h5 class="card-title">{{ $s->sppp->tahun }}</h5>
                            <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $s->sppp->tahun }}" min="1900" max="{{ date('Y') }}" step="1">
                        </div>
                        <hr>

                        <div class="mb-3">
                            <label for="semester" class="form-label">Bulan Dibayar</label>
                            <h5 class="card-title">Jumlah Bulan Yang Sudah Dibayar {{ $s->sppp->semester }} Bulan / 12 Bulan</h5>
                            <input type="number" class="form-control" id="semester" name="semester" value="{{ $s->sppp->semester }}">
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <h5 class="card-title">{{ $s->sppp->nominal }}</h5>
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
                        <form action="/siswainput" method="POST" onsubmit="return validateForm()">
                            @csrf
                            <div class="mb-3">
                                <label for="nohp" class="form-label">NISN</label>
                                <input type="number" class="form-control" maxlength="10" id="nisn" name="nisn" value="" placeholder="Masukkan NISN">
                            </div>
                            <div class="mb-3">
                                <label for="nohp" class="form-label">NIS</label>
                                <input type="number" class="form-control" maxlength="16" id="nis" name="nis" value="" placeholder="Masukkan NIS">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="" placeholder="Masukkan Nama">
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <div class="form-group">
                                    <select class="form-control" id="dropdownInput" name="id_kelas">
                                        <option value="" hidden>Kelas</option>
                                        @foreach ($kelas as $index => $s)
                                        <option value="{{ $s->id_kelas }}">{{ $s->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="" placeholder="Masukkan Alamat">
                            </div>
                            <div class="mb-3">
                                <label for="nohp" class="form-label">No. HP</label>
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input type="text" class="form-control" maxlength="15" id="no_telp" name="no_telp" value="" placeholder="Masukkan No Telepon" oninput="formatPhoneNumber(this);">
                                </div>
                            </div>
                            <input type="hidden" name="tahun" value="{{ date('Y') }}">
                            <input type="hidden" name="nominal" value="{{ 0 }}">

        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
@foreach ($siswa as $s)
        <div class="modal fade" id="hapusModal{{ $s->nisn }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin Ingin Menghapus {{ $s->nama }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="/hapussiswa/{{ $s->nisn }}">
                            <button type="button" class="btn btn-danger">Ya</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    @endforeach
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

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

    document.addEventListener('DOMContentLoaded', function () {
            // Assuming you have an ID for your form, for example, 'editForm'
            var editForm = document.getElementById('editForm');

            editForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the form from submitting in the traditional way

                // Perform your form submission using Ajax or other methods

                // Show the confirmation modal after successful form submission
                var confirmationModalId = 'confirmationModal' + nisn; // Replace nisn with the actual value
                var confirmationModal = new bootstrap.Modal(document.getElementById(confirmationModalId));
                confirmationModal.show();
            });
        });

        function formatPhoneNumber(input) {
        // Remove non-numeric characters from the input
        var numericValue = input.value.replace(/\D/g, '');

        // Ensure the numeric value does not exceed the maximum length
        if (numericValue.length > input.maxLength) {
            numericValue = numericValue.slice(0, input.maxLength);
        }

        // Check if the input starts with "0" and has 10 digits
        if (numericValue.length === 10 && numericValue.startsWith('0')) {
            // Replace the leading "0" with "+62"
            input.value = '+62' + numericValue.slice(1);
        } else {
            // Check if the input does not start with "+62" or "62"
            if (!numericValue.startsWith('62')) {
                // Set the formatted value with "+62" prefix if the input is not empty
                input.value = numericValue ? '+62' + numericValue : '';
            } else {
                // If the input starts with "+62" or "62," set the value without modification
                input.value = '+' + numericValue;
            }
        }
    }
  </script>
@endsection


