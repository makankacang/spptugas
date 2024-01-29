
@extends('layout.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <section class="section">
        
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#inputModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg> Buat Pesanan
        </button> 6500 / kg

        <div class="row">
            @if ($message = Session::get('success'))

            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
          @endif
          @if ($message = Session::get('hapus'))
          
            <div class="alert alert-danger" role="alert">
              {{ $message }}
            </div>
          @endif
          @if ($message = Session::get('ubah'))
          
            <div class="alert alert-info" role="alert">
              {{ $message }}
            </div>
          @endif
            @foreach ($ord as $index => $o)
                <div class="col-lg-6">
                    
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nomor Faktur {{ $o->nofaktur }}</h5>
                            <h4>{{ $o->customer->nama }}</h4>
                            <h4>{{ $o->jumlahbayar }}</h4>
          
                            <th>
                              
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $o->nofaktur }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button> |
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $o->nofaktur }}">
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

    @foreach ($ord as $o)
        <div class="modal fade" id="editModal{{ $o->nofaktur }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/ordedit/{{ $o->nofaktur }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nofaktur" class="form-label">Pesanan untuk</label>
                                <div class="form-group">
                                    <select class="form-control" id="dropdownInput" name="idc">
                                        <option value="{{ $o->customer->idc }}">{{ $o->customer->nama }}</option>
                                        @foreach ($ang as $a)
                                            <option value="{{ $o->customer->idc }}">
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
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="radio1" value="baru" {{ $o->status === 'baru' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="radio1">
                                        baru
                                    </label>
                                </div>
                            
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="radio2" value="proses" {{ $o->status === 'proses' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="radio2">
                                        proses
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="radio3" value="selesai" {{ $o->status === 'selesai' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="radio3">
                                        selesai
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="radio4" value="diambil" {{ $o->status === 'diambil' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="radio4">
                                        diambil
                                    </label>
                                </div>
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
                        <h5 class="modal-title">Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/ordinput" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nofaktur" class="form-label">No Faktur</label>
                                <input type="text" class="form-control" id="nofaktur" name="nofaktur" value="" placeholder="Masukkan nofaktur">
                            </div>
                            <div class="mb-3">
                                <label for="nofaktur" class="form-label">Pesanan untuk</label>
                                <div class="form-group">
                                    <select class="form-control" id="dropdownInput" name="idc">
                                        <option value="">Pilih Pelanggan</option>
                                        @foreach ($ang as $index => $o)
                                        <option value="{{ $o->idc }}">{{ $o->nama }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                            </div>
                            <div class="mb-3">
                                <label for="tglbayar" class="form-label">Tanggal Bayar</label>
                                <input type="date" class="form-control" id="tglbayar" name="tglbayar" value="" placeholder="Masukkan tglbayar">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="" placeholder="Masukkan jumlah">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="radio1" value="baru" checked>
                                    <label class="form-check-label" for="radio1">
                                      baru
                                    </label>
                                  </div>
                                  
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="radio2" value="proses">
                                    <label class="form-check-label" for="radio2">
                                      proses
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="radio3" value="selesai">
                                    <label class="form-check-label" for="radio3">
                                      selesai
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="radio4" value="diambil">
                                    <label class="form-check-label" for="radio4">
                                      diambil
                                    </label>
                                  </div>
                                  
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
        
        
        @foreach ($ord as $o)

        <div class="modal fade" id="hapusModal{{ $o->nofaktur }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin Ingin Menghapus No Faktur{{ $o->nofaktur }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="/hapusord/{{ $o->nofaktur }}">
                            <button type="button" class="btn btn-danger">Ya</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
  
@endforeach
@endsection
