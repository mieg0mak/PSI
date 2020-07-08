@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Mata Pelajaran</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Mata Pelajaran</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataKurikulum" class="table table-bordered table-hover">
                    <thead>
                      <tr>                        
                        <th>Kode</th>                    
                        <th>Nama</th>
                        <!--<th>Guru Wali</th>-->
                        <th>Kurikulum</th>                        
                        <th>Kelas</th>
                        <th>Aksi</th> 
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($mapel as $itemMapel):  ?>
                      <tr>
                        <td>{{$itemMapel->mapelKode}}</td>
                        <td>{{$itemMapel->mapelNama}}</td>
                        <!--<td>{{$itemMapel->guruNama}}</td>-->
                        <td>{{$itemMapel->mapelKurId}}</td> 
                        <td>{{$itemMapel->mapelKelasId}}</td>
                        <td><a href="{{{ URL::to('mapel/'.$itemMapel->mapelKode.'/detail') }}}">
                              <span class="label label-info"><i class="fa fa-list"> Detail </i></span>
                              </a>
                        </td>
                      </tr>
                      <?php endforeach  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Kode</th>                    
                        <th>Nama</th>
                        <!--<th>Guru Wali</th>   -->                         
                        <th>Kurikulum</th>                        
                        <th>Kelas</th>
                        <th>Aksi</th>     
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->

@endsection
@section('script')

    <script src="{{ URL::asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
      $(function () {

        $('#dataKurikulum').DataTable({"pageLength": 10});

      });

    </script>

@endsection

