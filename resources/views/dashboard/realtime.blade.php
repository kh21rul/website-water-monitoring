    {{-- Panggil file jquery untuk proses reatime --}}
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>
    
    {{-- ajax untuk realtime --}}
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#suhu").load("{{ url('bacasuhu') }}");
                $("#kekeruhan").load("{{ url('bacakekeruhan') }}");
                $("#ph").load("{{ url('bacaph') }}");
                $("#oksigen").load("{{ url('bacado') }}");
                $("#kualitas_air").load("{{ url('bacakualitasair') }}");
                $("#kendali").load("{{ url('bacakendali') }}");
            }, 1000);
        });
    </script>