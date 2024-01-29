@extends('layout.app')

@section('content')

<section class="section">
    <div class="row">
      <div class="">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Histori Pembayaran</h5>

            <!-- Default Table -->
            <table class="table">
              <tbody>
                <thead>
                    <tr>
                      <th scope="col">Waktu</th>
                      <th scope="col">ID</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Bulan Bayar</th>
                      <th scope="col">Tahun Bayar</th>
                      <th scope="col">ID SPP</th>
                      <th scope="col">Jumlah Dibayar</th>
                      <th scope="col">Berapa Bulan yang dibayar</th>
                      <th scope="col">Oleh Petugas</th>
                    </tr>
                  </thead>
                @forelse ($his as $h) 

                <tr>
                    <td>{{ $h->created_at }}</td>
                  <th scope="row">{{ $h->id_pembayaran }}</th>
                  <td>{{ $h->siswa->nama }}</td>
                  <td>{{ $h->bulan_dibayar }}</td>
                  <td>{{ $h->tahun_dibayar }}</td>
                  <td scope="row">{{ $h->id_spp }}</td>
                  <td>{{ $h->jumlah_bayar }}</td>
                  <td>{{ $h->semester }}</td>
                  <td scope="row">{{ $h->admin }}</td>

                </tr>
                @empty
                <tr>
                  <th scope="row">Tidak ada data</th>
                  <td>Tidak ada data</td>
                  <td>Tidak ada data</td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <!-- End Default Table Example -->
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
