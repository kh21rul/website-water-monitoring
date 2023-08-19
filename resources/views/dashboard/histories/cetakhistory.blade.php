<!DOCTYPE html>
<html lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('dashmin/assets/') }}"
    data-template="vertical-menu-template-free">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/iconWeb.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('dashmin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('dashmin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('dashmin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('dashmin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('dashmin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ ('dashmin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('dashmin/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('dashmin/assets/vendor/js/helpers.js/assets/js/config.js') }}"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <meta name="csrf-token" content=" {{ csrf_token() }} ">
    <title>Data Monitoring | {{ request('filter') ? request('filter') : now()->format('Y-m-d') }}</title>
</head>
<body>
    <div class="container-xl flex-grow-1 container-p-y">
    <!-- Basic Bootstrap Table -->
        <div class="card mb-2">
        <h5 class="card-header">Rekap Data Monitoring {{ $controls[0]->created_at->format('d M Y') }}</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
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
                @if ($controls->count() == 0)
                    <tr>
                        <td colspan="10" class="text-center">Belum ada data</td>
                    </tr>
                @endif
                @foreach ($controls as $control)
                <tr>
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

    {{-- perintah print --}}
    <script>
        window.print();
    </script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('dashmin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('dashmin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dashmin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashmin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('dashmin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('dashmin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('dashmin/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('dashmin/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>