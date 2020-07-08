@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Kepala Sekolah</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kepala Sekolah <a href="{{{ URL::to('kepsek/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataKepsek" class="table table-bordered table-hover">
                    <thead>
                      <tr>                        
                        <th>NIP</th>                    
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>                            
                        <th>TTL</th>                        
                        <th>Alamat</th>
                        <th>Aktif Mulai</th>
                        <th>Aktif Selesai</th> 
                        <th>Aksi</th> 
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($kepsek as $itemKepsek):  ?>
                      <tr>
                        <td>{{$itemKepsek->kepsekNip}}</td>
                        <td>{{$itemKepsek->kepsekNama}}</td>
                        <td>{{$itemKepsek->kepsekJk}}</td>
                        <td>{{$itemKepsek->kepsekTtl}}</td> 
                        <td>{{$itemKepsek->kepsekAlamat}}</td>
                        <td>{{$itemKepsek->kepsekAktifM}}</td>  
                        <td>{{$itemKepsek->kepsekAktifS}}</td> 
                        <td><a href="{{{ URL::to('kepsek/'.$itemKepsek->kepsekId.'/detail') }}}">
                              <span class="label label-info"><i class="fa fa-list"> Detail </i></span>
                            </a>
                            <a href="{{{ URL::to('kepsek/'.$itemKepsek->kepsekId.'/hapus') }}}" title="hapus" onclick="return confirm('Apakah anda yakin akan menghapus data Kepala Sekolah {{{$itemKepsek->kepsekNama }}}?')">
                            <span class="label label-danger"><i class="fa fa-trash"> Delete </i></span>
                            </a>
                        </td>
                      </tr>
                      <?php endforeach  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>NIP</th>
                        <th>Nama</th>                    
                        <th>Jenis Kelamin</th>                            
                        <th>TTL</th>                        
                        <th>Alamat</th>
                        <th>Aktif Mulai</th>
                        <th>Aktif Selesai</th>
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

        $('#dataKepsek').DataTable({"pageLength": 10});

      });

    </script>

@endsection

