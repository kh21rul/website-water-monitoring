@extends('dashboard.layouts.main')

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">dashboard /</span> controls</h4>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
    @endif
    <!-- Basic Bootstrap Table -->
        <div class="card mb-2">
        <h5 class="card-header">Rekap Data Monitoring Perhari</h5>
        <div class="card-body col-md-5 mb-2">
            <form action="/dashboard/controls">
                @csrf
                <div class="input-group">
                    <input
                        name="filter"
                        type="date"
                        class="form-control"
                        value="{{ request('filter') ?: $today }}"
                    />
                    <button class="btn btn-outline-primary" type="submit"><i class="bx bx-search"></i> Filter</button>
                    </form>
                    <a class="btn btn-outline-secondary" target="_blank" href="/dashboard/cetak{{ request()->has('filter') ? '?filter=' . request('filter') : '' }}"><i class="bx bx-printer"></i> Cetak</a>
                </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pukul</th>
                    <th>Suhu</th>
                    <th>Keruh</th>
                    <th>pH</th>
                    <th>Oksigen</th>
                    <th>Kulitas</th>
                    <th>Kendali</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody class="table-border-bottom-0">
                @if ($controls->count() == 0)
                    <tr>
                        <td colspan="10" class="text-center">Belum ada data</td>
                    </tr>
                @endif
                @foreach ($controls as $control)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $control->created_at->format('d M Y') }}</td>
                    <td><strong>{{ $control->created_at->format('H:i') }}</strong></td>
                    <td>{{ $control->temperature }}</td>
                    <td>{{ $control->turbidity }}</td>
                    <td>{{ $control->ph }}</td>
                    <td>{{ $control->dissolved_oxygen }}</td>
                    <td><span class="badge me-1 {{ $control->water_pump == 'Hidup' ? 'bg-label-danger' : 'bg-label-success' }}">{{ $control->water_pump }}</span></td>
                    <td><span class="badge me-1 {{ $control->aerator == 'Hidup' ? 'bg-label-danger' : 'bg-label-success' }}">{{ $control->aerator }}</span></td>
                    <td>
                    <div class="dropdown">
                        <a href="#" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </a>
                        <div class="dropdown-menu">
                            <form action="/dashboard/controls/{{ $control->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="dropdown-item">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    <!--/ Basic Bootstrap Table -->
    </div>
@endsection