@extends('dashboard.layouts.main')

@section('container')
<!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Congratulations {{ auth()->user()->name }}! 🎉</h5>
                <p class="mb-4">
                  Sistem Kendali mu telah membantu perbaiki kualias air sebanyak <span class="fw-bold">82%</span> silahkan cek history
                </p>

                <a href="#" class="btn btn-sm btn-outline-primary">History Kendali</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="{{ asset('dashmin/assets/img/illustrations/man-with-laptop-light.png') }}"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('dashmin/assets/img/icons/unicons/suhu.png') }}"
                      alt="chart success"
                      class="rounded"
                    />
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Suhu Air</span>
                <h3 id="suhu" class="card-title mb-2">0</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('dashmin/assets/img/icons/unicons/keruh.png') }}"
                      alt="Credit Card"
                      class="rounded"
                    />
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Kekeruhan Air</span>
                <h3 id="kekeruhan" class="card-title mb-2">0</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Revenue -->
      <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <!-- Basic Bootstrap Table -->
          <div class="card">
              <h5 class="card-header">History Sistem Kendali Terbaru</h5>
              <div class="table-responsive text-nowrap">
              <table class="table">
                  <thead>
                  <tr>
                      <th>Tanggal</th>
                      <th>Pukul</th>
                      <th>Suhu</th>
                      <th>Keruh</th>
                      <th>pH</th>
                      <th>Oksigen</th>
                      <th>Kulitas</th>
                      <th>Kendali</th>
                  </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                  @foreach ($controls as $control)
                  <tr>
                      <td>{{ $control->created_at->format('d M Y') }}</td>
                      <td><strong>{{ $control->created_at->format('H:i') }}</strong></td>
                      <td>{{ $control->temperature }}</td>
                      <td>{{ $control->turbidity }}</td>
                      <td>{{ $control->ph }}</td>
                      <td>{{ $control->dissolved_oxygen }}</td>
                      <td>{{ $control->kualitas_air }}</td>
                      <td><span class="badge me-1 {{ $control->sistem_kendali == 'Hidup' ? 'bg-label-danger' : 'bg-label-success' }}">{{ $control->sistem_kendali }}</span></td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
              </div>
          </div>
        <!--/ Basic Bootstrap Table -->
      </div>

      <!--/ Total Revenue -->
      <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('dashmin/assets/img/icons/unicons/ph.png') }}" alt="Credit Card" class="rounded" />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt4"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">pH Air</span>
                <h3 id="ph" class="card-title text-nowrap mb-2">0</h3>
              </div>
            </div>
          </div>
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('dashmin/assets/img/icons/unicons/oksigen.png') }}" alt="Credit Card" class="rounded" />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt1"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Oksigen Air</span>
                <h3 id="oksigen" class="card-title mb-2">0</h3>
              </div>
            </div>
          </div>
          <div class="col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                  <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                      <span class="badge bg-label-warning rounded-pill mb-3">Kualitas Air</span>
                      <h5 id="kualitas_air" class="text-nowrap">Baik</h5>
                    </div>
                    <div class="mt-sm-auto">
                      <small class="text-success text-nowrap fw-semibold"
                        >Sistem Kendali</small
                      >
                      <h3 id="kendali" class="mb-0">Mati</h3>
                    </div>
                  </div>
                  <div id="profileReportChart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@include('dashboard.realtime')
<!-- / Content -->
@endsection