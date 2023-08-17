@extends('dashboard.layouts.main')

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">dashboard /</span> controls</h4>
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
                        value="{{ request('filter') }}"
                        id="date-input"
                    />
                    <button class="btn btn-outline-primary" type="submit">Filter</button>
                    </form>
                    <button class="btn btn-outline-secondary" type="#" id="button-addon2">Cetak</button>
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
                @foreach ($controls as $control)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $control->created_at->format('d M Y') }}</td>
                    <td><strong>{{ $control->created_at->format('H:i') }}</strong></td>
                    <td>{{ $control->temperature }}</td>
                    <td>{{ $control->turbidity }}</td>
                    <td>{{ $control->ph }}</td>
                    <td>{{ $control->dissolved_oxygen }}</td>
                    <td>{{ $control->kualitas_air }}</td>
                    <td><span class="badge me-1 {{ $control->sistem_kendali == 'Hidup' ? 'bg-label-danger' : 'bg-label-success' }}">{{ $control->sistem_kendali }}</span></td>
                    <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-trash me-1"></i> Delete</a
                        >
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

    {{-- apabila request ada pada /dashboard/controls maka tampilkan script di bawah --}}
    @if (request('filter') == '')
        <script>
            // Dapatkan elemen input tanggal menggunakan ID
            var dateInput = document.getElementById('date-input');
            
            // Dapatkan tanggal hari ini dalam format YYYY-MM-DD
            var today = new Date().toISOString().substr(0, 10);
            
            // Setel nilai input tanggal ke tanggal hari ini
            dateInput.value = today;
        </script>
    @endif
@endsection