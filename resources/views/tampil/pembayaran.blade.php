
@extends('layout.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <section class="section">
        
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#inputModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg> SPP
        </button> RP 330.000 / 1 Bulan

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
            }, 10000);
        </script>
        @endif

            @foreach ($pembayaran as $index => $o)
                <div class="col-lg-6">
                    
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ID Pembayaran {{ $o->id_pembayaran }}</h5>
                            <h4>{{ $o->siswa->nama }}</h4>
                            <h4>{{ $o->jumlahbayar }}</h4>
          
                            <th>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $o->id_pembayaran }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button> |
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sppModal{{ $o->id_pembayaran }}">
                                    Masukkan nominal ke SPP
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

    @foreach ($pembayaran as $o)
        <div class="modal fade" id="editModal{{ $o->id_pembayaran }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/pembayaranedit/{{ $o->id_pembayaran }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_pembayaran" class="form-label">SPP Untuk</label>
                                <div class="form-group">
                                    <select class="form-control" id="dropdownInput" name="nisn">
                                        <option value="{{ $o->siswa->nisn }}">{{ $o->siswa->nama }}</option>
                                        @foreach ($siswa as $a)
                                            <option value="{{ $o->siswa->nisn }}">
                                                {{ $a->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="tglbayar" class="form-label">Tanggal Bayar</label>
                                <input type="date" class="form-control" id="tglbayar" name="tglbayar" value="{{ $o->tglbayar }}" placeholder="Masukkan tglbayar">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $o->jumlah }}" placeholder="Masukkan jumlah">
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
                        <h5 class="modal-title">SPP</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/pembayaraninput" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_pembayaran" class="form-label">ID Pembayaran</label>
                                <input type="text" class="form-control" id="id_pembayaran" name="id_pembayaran" value="" placeholder="Masukkan ID Pembayaran">
                            </div>
                        
                                <input type="hidden" class="form-control" id="admin" name="admin" value="{{ Auth::user()->name }}" placeholder="Masukkan id_pembayaran">
                            
                                <div class="mb-3">
                                    <label for="id_pembayaran" class="form-label">SPP untuk</label>
                                    <div class="form-group">
                                        <select class="form-control" id="dropdownInput" name="nisn" onchange="updateIdSpp()" required>
                                            <option value="">Pilih Siswa</option>
                                            @foreach ($siswa as $index => $o)
                                                <option value="{{ $o->nisn }}" data-id-spp="{{ $o->id_spp }}">{{ $o->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <div class="mb-3">
                                <label for="tglbayar" class="form-label">Tanggal Bayar</label>
                                <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" value="{{ date('Y-m-d') }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="bulan_dibayar" class="form-label">Bulan Bayar</label>
                                <input type="number" class="form-control" id="bulan_dibayar" name="bulan_dibayar" value="{{ date('m') }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="tahun_dibayar" class="form-label">Tahun Dibayar</label>
                                <input type="number" class="form-control" id="tahun_dibayar" name="tahun_dibayar" value="{{ date('Y') }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="semester" class="form-label">Berapa bulan untuk dibayar</label>
                                <input type="number" class="form-control" id="semester" name="semester" value="" placeholder="Masukkan semester">
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
        
        
        @foreach ($pembayaran as $o)

        <div class="modal fade" id="hapusModal{{ $o->id_pembayaran }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin Ingin Menghapus pembayaran {{ $o->id_pembayaran }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="/hapuspembayaran/{{ $o->id_pembayaran }}">
                            <button type="button" class="btn btn-danger">Ya</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        @foreach ($pembayaran as $o)
    <div class="modal fade" id="sppModal{{ $o->id_pembayaran }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin Ingin Memasukkan nominal {{ $o->id_pembayaran }} ke {{ $o->nisn }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="generateFakturAndRedirect({{ $o->id_pembayaran }})">Proceed</button>
                </div>
            </div>
        </div>
    </div>
@endforeach



        <script>
            // Set the current date and time for read-only date inputs
            function generateFakturAndRedirect(id_pembayaran) {
        // Open a new window for the faktur
        window.open('/generate-faktur/' + id_pembayaran, '_blank');

        // Redirect to '/tambahpembayaran'
        window.location.href = '/tambahpembayaran/' + id_pembayaran;
    }
    
            document.addEventListener('DOMContentLoaded', function () {
                var currentDate = new Date().toISOString().split('T')[0];
                document.getElementById('tgl_bayar').value = currentDate;
                document.getElementById('bulan_dibayar').value = currentDate;
                document.getElementById('tahun_dibayar').value = currentDate;
            });
        </script>
  
@endforeach
@endsection
