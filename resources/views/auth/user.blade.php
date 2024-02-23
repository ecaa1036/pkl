
@extends('template.dasboard')
@section('index')
        
@if (session('pesan'))
<div class="alert alert-success">
  {{session('pesan')}}
</div>       
@endif
                  <h6 class="m-0 font-weight-bold text-primary"><a href="user/create"><button class="btn btn-primary">Tambah+</button></a></h6>
                </div>
                <div class="text-center">
                </div>
                <form action="user/cari" method="post">
                @csrf
                <div class="col col-lg-7">

                  <input type="text" name="cari" id=""  ><button class="btn btn-info" type="submit">Cari</button>
                </div>
              </form>
              <div class="table-responsive py-2">
                <table id="zero_config" class="table table-striped table-bordered no-wrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->level}}</td>
                            <td>
                                <a href="user/edit/{{$item->id_user}}"><button class="btn btn-success">Edit</button></a>
                                <a href="user/delete/{{$item->id_user}}"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
             
      </div>
    </div>
  </div>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); 
    });
  </script>
   @endsection
{{-- </body>

</html> --}}