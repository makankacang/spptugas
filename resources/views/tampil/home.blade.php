@extends('layout.app')

@section('content')

<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Customer</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-emoji-laughing"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ \App\Models\customer::count() }}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Pesanan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ \App\Models\order::count() }}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah User</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ \App\Models\User::count() }}</h6>
                 
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Pembayaran Terbaru</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Waktu</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Bulan Bayar</th>
                        <th scope="col">Tahun Bayar</th>
                        <th scope="col">Berapa Bulan yang dibayar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($rec as $r) 

                      <tr>
                          <td>{{ $r->created_at }}</td>
                        <td>{{ $r->siswa->nama }}</td>
                        <td>{{ $r->bulan_dibayar }}</td>
                        <td>{{ $r->tahun_dibayar }}</td>
                        <td>{{ $r->semester }}</td>
      
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

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Website Traffic -->
          <div class="card">
            <div class="card-body pb-0">
                <h5 class="card-title">Chart</h5>
        
                <div id="trafficChart" style="min-height: 400px;" class="echart" data-customer-count="{{ \App\Models\customer::count() }}" data-order-count="{{ \App\Models\order::count() }}" data-siswa-count="{{ \App\Models\siswa::count() }}" data-kelas-count="{{ \App\Models\kelas::count() }}"></div>
        
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        var customerCount = document.querySelector("#trafficChart").getAttribute('data-customer-count');
                        var orderCount = document.querySelector("#trafficChart").getAttribute('data-order-count');
                        var siswaCount = document.querySelector("#trafficChart").getAttribute('data-siswa-count');
                        var kelasCount = document.querySelector("#trafficChart").getAttribute('data-kelas-count');
        
                        echarts.init(document.querySelector("#trafficChart")).setOption({
                            tooltip: {
                                trigger: 'item'
                            },
                            legend: {
                                top: '5%',
                                left: 'center'
                            },
                            series: [{
                                type: 'pie',
                                radius: ['40%', '70%'],
                                avoidLabelOverlap: false,
                                label: {
                                    show: false,
                                    position: 'center'
                                },
                                emphasis: {
                                    label: {
                                        show: true,
                                        fontSize: '18',
                                        fontWeight: 'bold'
                                    }
                                },
                                labelLine: {
                                    show: false
                                },
                                data: [{
                                    value: customerCount,
                                    name: 'Total Customers'
                                },
                                {
                                    value: orderCount,
                                    name: 'Total Orders'
                                },
                                {
                                    value: kelasCount,
                                    name: 'Total Kelas'
                                },
                                {
                                    value: siswaCount,
                                    name: 'Total Siswa'
                                }]
                            }]
                        });
                    });
                </script>
            </div>
        </div>
        
        
          
          
          </div><!-- End Website Traffic -->


        </div><!-- End Right side columns -->

      </div>
    </section>


@endsection
