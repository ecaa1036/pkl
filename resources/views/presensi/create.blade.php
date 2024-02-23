@extends('template.dasboard')
@section('index')
<style>
    .webcam-capture,
    .webcam-capture video{
        display: inline-block;
        width: 100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 15px;
    }

</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/> 
    <link rel="icon" type="image/png" href="{{asset('bts/assets/img/favicon.png')}}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('bts/assets/img/icon/192x192.png')}}">
    <link rel="stylesheet" href="{{asset('bts/assets/css/style.css')}}">
    <link rel="manifest" href="{{asset('bts/__manifest.json')}}">
      <!-- App Bottom Menu -->
      <div class="row" style="margin: 70px">
        <div class="col">
            {{-- <input type="hidden" name="" id="lokasi"> --}}
            <div class="webcam-capture"></div>
        </div>
    </div>
    {{-- <div class="row mt-2">
        <div class="col">
            <div id="map"></div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col">
            <button id="takeabsen" class="btn btn-primary btn-block"><ion-icon name="camera-outline">Absen Masuk</ion-icon></button>
        </div>
    </div>
      <div class="appBottomMenu">
        <a href="#" class="item {{request()->is('dasboard') ? 'active' : ''}}">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="#" class="item active">
            <div class="col">
                <ion-icon name="calendar-outline" role="img" class="md hydrated"
                    aria-label="calendar outline"></ion-icon>
                <strong>Calendar</strong>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">
                <div class="action-button large">
                    <ion-icon name="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                </div>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">
                <ion-icon name="document-text-outline" role="img" class="md hydrated"
                    aria-label="document text outline"></ion-icon>
                <strong>Docs</strong>
            </div>
        </a>
        <a href="javascript:;" class="item">
            <div class="col">
                <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
                <strong>Profile</strong>
            </div>
        </a>
    </div>
    {{-- Lokasi --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js')}}"></script>
    <script src="{{asset('bts/assets/js/lib/jquery-3.4.1.min.js')}}"></script>
    <!-- Bootstrap-->
    <script src="{{asset('bts/assets/js/lib/popper.min.js')}}"></script>
    <script src="{{asset('bts/assets/js/lib/bootstrap.min.js')}}"></script>
    <!-- Ionicons -->
    <script type="module" src="{{asset('bts/https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js')}}"></script>
    <!-- Owl Carousel -->
    <script src="{{asset('bts/assets/js/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <!-- jQuery Circle Progress -->
    <script src="{{asset('bts/assets/js/plugins/jquery-circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/4/core.js')}}"></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/4/charts.js')}}"></script>
    <script src="{{asset('https://cdn.amcharts.com/lib/4/themes/animated.js')}}"></script>
    <!-- Base Js File -->
    <script src="{{asset('bts/assets/js/base.js')}}"></script>
    <script>
        am4core.ready(function () {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            var chart = am4core.create("chartdiv", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

            chart.legend = new am4charts.Legend();

            chart.data = [
                {
                    country: "Hadir",
                    litres: 501.9
                },
                {
                    country: "Sakit",
                    litres: 301.9
                },
                {
                    country: "Izin",
                    litres: 201.1
                },
                {
                    country: "Terlambat",
                    litres: 165.8
                },
            ];



            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";
            series.alignLabels = false;
            series.labels.template.text = "{value.percent.formatNumber('#.0')}%";
            series.labels.template.radius = am4core.percent(-40);
            series.labels.template.fill = am4core.color("white");
            series.colors.list = [
                am4core.color("#1171ba"),
                am4core.color("#fca903"),
                am4core.color("#37db63"),
                am4core.color("#ba113b"),
            ];
        }); // end am4core.ready()
    </script>
    <script>
        Webcam.set({
            height : 480,
            width : 640,
            image_format : 'jpeg',
            jpeg_quality : 80

        });

        Webcam.attach('.webcam-capture');

        // var lokasi = document.getElementById('lokasi');
        // if(navigator.geolocation){
        //     navigator.geolocation.getCurrentPosition(successCallback, errorCallBack);
        // }

        // function successCallback(position){
        //     lokasi.value = position.coords.latitude + "," + position.coords.longitude;
        //     var map = L.map('map').setView([ position.coords.latitude, position.coords.longitude], 13);
        //     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     maxZoom: 19,
        //     attribution: '; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        // }).addTo(map);

        // }
        // function errorCallBack(){

        // }
       $('#takeabsen').click(function(e){
            Webcam.snap(function(uri){
                image = uri;
            });
            $.ajax({
                type: 'POST',
                url: '/presensi/store',
                data:{
                    _token:"{{ csrf_token() }}",
                    image: image,
                    // lokasi: lokasi
                },
                cache: false,
                success: function(respond){
                    if(respond == 0){
                        alert('success');
                    }else{
                        alert('error');
                    }
                }
            });
       });

    </script>
@endsection