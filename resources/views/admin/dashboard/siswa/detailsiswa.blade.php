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
            <li class="active">Detail Siswa</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Siswa</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                 <?php foreach ($siswa as $itemSiswa);  ?>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-3">
                      <p align="center">
                        <img src="{{ URL::asset('admin/dist/img/user-160-nobody.jpg') }}" alt="User Image">
                        <a class="users-list-name" href="#">{{$itemSiswa->sisNama}}</a>
                        <span class="users-list-date">Siswa Tetap</span>
                      </p>
                    </div><!-- /.col -->
                    <div class="col-md-8">
                     <table id="dataKurikulum" class="table table-bordered table-hover">                    
                      <tbody>
                        <tr>
                          <td>NISN</td>  
                          <td>{{$itemSiswa->sisNisn}}</td>
                        </tr>
                        <tr>
                          <td>NIS</td> 
                          <td>{{$itemSiswa->sisNis}}</td>
                        </tr>
                        <tr>
                          <td>Nama</td> 
                          <td>{{$itemSiswa->sisNama}}</td>
                        </tr>
                        <tr>
                          <td>Kelas</td> 
                          <td>{{$itemSiswa->sisKelasKode}}</td>
                        </tr>
                        <tr>
                          <td>Angkatan</td> 
                          <td>{{$itemSiswa->sisAngkatan}}</td>
                        </tr>
                        <tr>
                          <td>Status Aktif</td> 
                          <td>{{$itemSiswa->sisStatusAktif}}</td>
                        </tr>
                      </tbody>
                      
                    </table>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
                 
              </div>
            </div>
                       
          </div><!-- /.row -->

@endsection
@section('script')

  

@endsection

