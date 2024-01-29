@extends('layout.app')

@section('content')

<section class="section">
    <div class="row">
      <div class="">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Default Table</h5>

            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Admin</th>
                  <th scope="col">Created At</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $u) 
                <tr>
                  <th scope="row">{{ $u->id }}</th>
                  <td>{{ $u->name }}</td>
                  <td>{{ $u->email }}</td>
                  
                  <td>@if($u->role == "user")<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg nop" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                  </svg>@endif
           
            @if($u->role == "admin")<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-lg  suksd" viewBox="0 0 16 16">
              <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
            </svg>@endif</td>
                  <td>{{ $u->created_at }}</td>
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
