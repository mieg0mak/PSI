@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Guru</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Guru <a href="{{{ URL::to('guru/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataKurikulum" class="table table-bordered table-hover">
                    <thead>
                      <tr>                        
                        <th>NIP</th>                    
                        <th>Nama</th>                            
                        <th>Jenis Kelamin</th>                        
                        <th>TTL</th>
                        <th>Alamat</th>
                        <th>KelasKode</th>
                        <th>Aktif Mulai</th>
                        <th>Aktif Selesai</th> 
                        <th>Aksi</th> 
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($guru as $itemGuru):  ?>
                      <tr>
                        <td>{{$itemGuru->guruNip}}</td>
                        <td>{{$itemGuru->guruNama}}</td>
                        <td>{{$itemGuru->guruJk}}</td>
                        <td>{{$itemGuru->guruTtl}}</td> 
                        <td>{{$itemGuru->guruAlamat}}</td> 
                        <td>{{$itemGuru->guruKelasKode}}</td> 
                        <td>{{$itemGuru->guruAktifM}}</td>
                        <td>{{$itemGuru->guruAktifS}}</td>
                        <td><a href="{{{ URL::to('guru/'.$itemGuru->guruId.'/detail') }}}">
                              <span class="label label-info"><i class="fa fa-list"> Detail </i></span>
                            </a>
                            <a href="{{{ URL::to('guru/'.$itemGuru->guruId.'/hapus') }}}" title="hapus" onclick="return confirm('Apakah anda yakin akan menghapus data Guru {{{$itemGuru->guruNama }}}?')">
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
                        <th>KelasKode</th>
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

        $('#dataKurikulum').DataTable({"pageLength": 10});

      });

    </script>

@endsection

