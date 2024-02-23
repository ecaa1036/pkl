@extends('template.dasboard')
@section('index')
<script type="text/javascript">
    function displayTime(){
        var clientTime = new Date();
        var time=new Date(clientTime.getTime());
        var sh=time.getHours().toString();
        var sm=time.getMinutes().toString();
        var ss=time.getSeconds().toString();
        document.getElementById("jam").innerHTML = (sh.length==1?"0"+sh:sh)+":"+(sm.length==1?"0"+sm:sm)+":"+(ss.length==1?"0"+ss:ss);
        document.getElementById("jaminput").value = (sh.length==1?"0"+sh:sh)+":"+(sm.length==1?"0"+sm:sm)+":"+(ss.length==1?"0"+ss:ss);
    }
    </script>
   <body onload="setInterval('displayTime()', 1000);">
    <div class="text-center">
      <h1 id="jam"></h1>
    </div>
    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h3 class="text-dark mb-1 font-weight-medium">{{$hadir->siswa->nama}}</h3>
                           
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">{{$hadir->waktu_masuk}}</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted">{{$hadir->tgl_kehadiran}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                class="set-doller"></sup></h2>
                                
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="box" class="feather-icon"></i></span>
                                <a href="kehadiran"><button class="btn bnt-primary" type="submit">Token Keluar</button></a>
                    </div>
                </div>
            </div>
        </div>
</body>
@endsection