@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Siswa</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Siswa
                    @if(Auth::user()->level==1)
                      <a href="{{{ URL::to('siswa/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a>
                    @endif
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataSiswa" class="table table-bordered table-hover">
                    <thead>
                      <tr>                        
                        <th>NISN</th>
                        <th>NIS</th>                    
                        <th>Nama</th>                            
                        <th>Kelas</th>                        
                        <th>Angkatan</th>
                        <th>Status Aktif</th> 
                        <th>Aksi</th> 
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($siswa as $itemSiswa):  ?>
                      <tr>
                        <td>{{$itemSiswa->sisNisn}}</td>
                        <td>{{$itemSiswa->sisNis}}</td>
                        <td>{{$itemSiswa->sisNama}}</td>
                        <td>{{$itemSiswa->sisKelasKode}}</td> 
                        <td>{{$itemSiswa->sisAngkatan}}</td> 
                        @if($itemSiswa->sisStatusAktif==1)
                          <td>Aktif</td>
                        @else
                          <td>Tidak Aktif</td>
                        @endif
                        @if(Auth::user()->level==1)
                          <td><a href="{{{ URL::to('siswa/'.$itemSiswa->sisNisn.'/detail') }}}">
                              <span class="label label-info"><i class="fa fa-list"> Detail </i></span>
                              </a>
                              <a href="{{{ URL::to('siswa/'.$itemSiswa->sisNisn.'/hapus') }}}" title="hapus" onclick="return confirm('Apakah anda yakin akan menghapus data Siswa {{{$itemSiswa->sisNisn}}}?')">
                              <span class="label label-danger"><i class="fa fa-trash"> Delete </i></span>
                              </a>
                          </td>
                        @else
                          <td><a href="{{{ URL::to('datasiswa/'.$itemSiswa->sisNisn.'/detail') }}}">
                              <span class="label label-info"><i class="fa fa-list"> Detail </i></span>
                              </a>
                              <a href="{{{ URL::to('datasiswa/'.$itemSiswa->sisNisn.'/hapus') }}}" title="hapus" onclick="return confirm('Apakah anda yakin akan menghapus data Siswa {{{$itemSiswa->sisNisn}}}?')">
                              <span class="label label-danger"><i class="fa fa-trash"> Delete </i></span>
                              </a>
                          </td>
                        @endif
                      </tr>
                      <?php endforeach  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>NISN</th>
                        <th>NIS</th>                    
                        <th>Nama</th>                            
                        <th>Kelas</th>                        
                        <th>Status Aktif</th> 
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

        $('#dataSiswa').DataTable({"pageLength": 10});

      });

    </script>

@endsection

