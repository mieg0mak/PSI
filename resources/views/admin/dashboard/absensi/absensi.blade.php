@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Absensi</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Absensi
                  @if(Auth::user()->level==5)
                    @if(Auth::user()->kelasKode==1)
                      <a href="{{{ URL::to('dataabsensi/1/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a>
                    @elseif(Auth::user()->kelasKode==2)
                      <a href="{{{ URL::to('dataabsensi/2/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a>
                    @elseif(Auth::user()->kelasKode==3)
                      <a href="{{{ URL::to('dataabsensi/3/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a>
                    @elseif(Auth::user()->kelasKode==4)
                      <a href="{{{ URL::to('dataabsensi/4/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a>
                    @elseif(Auth::user()->kelasKode==5)
                      <a href="{{{ URL::to('dataabsensi/5/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a>
                    @else(Auth::user()->kelasKode==6)
                      <a href="{{{ URL::to('dataabsensi/6/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a>
                    @endif
                  @endif
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataKurikulum" class="table table-bordered table-hover">
                    <thead>
                      <tr>                        
                        <th>NISN</th>                    
                        <th>Status</th>
                        <th>Semester</th>                            
                        <th>Kelas</th>                        
                        <th>Tanggal</th>
                        <th>Aksi</th> 
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($absensi as $itemAbsensi):  ?>
                      <tr>
                        <td>{{$itemAbsensi->sisNama}}</td>
                        <td>{{$itemAbsensi->absensiStatus}}</td>
                        <td>{{$itemAbsensi->absensiSemId}}</td>
                        <td>{{$itemAbsensi->absensiKelasId}}</td> 
                        <td>{{$itemAbsensi->absensiTanggal}}</td>
                        <td><a href="{{{ URL::to('absensi/'.$itemAbsensi->absensiId.'/detail') }}}">
                              <span class="label label-info"><i class="fa fa-list"> Detail </i></span>
                              </a>
                        </td>
                      </tr>
                      <?php endforeach  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>NISN</th>                    
                        <th>Status</th>
                        <th>Semester</th>                            
                        <th>Kelas</th>                        
                        <th>Tanggal</th>
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

