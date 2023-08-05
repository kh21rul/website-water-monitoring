<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>

    {{-- Panggil file jquery untuk proses reatime --}}
    <script type="text/javascript" src="{{ ('jquery/jquery.min.js') }}"></script>
    
    {{-- ajax untuk realtime --}}
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#suhu").load("{{ url('bacasuhu') }}");
                $("#kekeruhan").load("{{ url('bacakekeruhan') }}");
                $("#pH").load("{{ url('bacaph') }}");
                $("#oksigen").load("{{ url('bacado') }}");
                $("#kualitas_air").load("{{ url('bacakualitasair') }}");
                $("#kendali").load("{{ url('bacakendali') }}");
            }, 1000);
        });
    </script>
</head>
  <body>
    
    {{-- Tampilan Website Header--}}
    <div class="container" style="text-align: center; margin-top: 80px; margin-bottom: 50px;">
        <img src="{{ ('images/hero.png') }}" style="width: 200px" alt="">
        <h2 style="margin-top: 15px">Nilai Parameter Kualitas Air <br> Secara Real Time</h2>
    </div>

    {{-- Tampilan Nilai Sensor --}}
    <div class="container">
        <div class="row" style="text-align: center">
            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-header" style="text-align: center; background-color: red; color: white;">
                        <h4>Suhu Air</h4>
                    </div>
                    <div class="card-body">
                        <div  style="font-size: 70px; font-weight: bold;">
                            <span id="suhu">0</span> <span style="font-size: 24px; vertical-align:top;">°C</span>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-header" style="text-align: center; background-color: red; color: white;">
                        <h4>Kekeruhan Air</h4>
                    </div>
                    <div class="card-body">
                        <div  style="font-size: 70px; font-weight: bold;">
                            <span id="kekeruhan">0</span> <span style="font-size: 24px; vertical-align:top;">NTU</span>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-header" style="text-align: center; background-color: red; color: white;">
                        <h4>kadar pH Air</h4>
                    </div>
                    <div class="card-body">
                        <div  style="font-size: 70px; font-weight: bold;">
                            <span id="pH">0</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-header" style="text-align: center; background-color: red; color: white;">
                        <h4>Kadar Oksigen Air</h4>
                    </div>
                    <div class="card-body">
                        <div  style="font-size: 70px; font-weight: bold;">
                            <span id="oksigen">0</span> <span style="font-size: 24px; vertical-align:top;">mg/L</span>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-5 mx-auto">
                <div class="card">
                    <div class="card-header" style="text-align: center; background-color: red; color: white;">
                        <h4>Kualitas air berdasarkan Fuzzy Logic</h4>
                    </div>
                    <div class="card-body">
                        <div  style="font-size: 70px; font-weight: bold;">
                            <span id="kualitas_air">Baik</span>
                        </div>
                        <p class="card-text" style="font-weight:bold">Pompa Air <span id="kendali">Mati</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>