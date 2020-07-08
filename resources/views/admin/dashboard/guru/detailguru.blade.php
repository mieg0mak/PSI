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
            <li class="active">Detail Guru</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Guru</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                 <?php foreach ($guru as $itemGuru);  ?>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-3">
                      <p align="center">
                        <img src="{{ URL::asset('admin/dist/img/user-160-nobody.jpg') }}" alt="User Image">
                        <a class="users-list-name" href="#">{{$itemGuru->guruNama}}</a>
                        <span class="users-list-date">Guru Tetap</span>
                      </p>
                    </div><!-- /.col -->
                    <div class="col-md-8">
                     <table id="dataKurikulum" class="table table-bordered table-hover">                    
                      <tbody>
                        <tr>
                          <td>NIP</td>  
                          <td>{{$itemGuru->guruNip}}</td>
                        </tr>
                        <tr>
                          <td>Nama</td> 
                          <td>{{$itemGuru->guruNama}}</td>
                        </tr>
                        <tr>
                          <td>JK</td> 
                          <td>{{$itemGuru->guruJk}}</td>
                        </tr>
                        <tr>
                          <td>TTL</td> 
                          <td>{{$itemGuru->guruTtl}}</td>
                        </tr>
                        <tr>
                          <td>Alamat</td> 
                          <td>{{$itemGuru->guruAlamat}}</td>
                        </tr>
                        <tr>
                          <td>Kelas</td> 
                          <td>{{$itemGuru->guruKelasKode}}</td>
                        </tr>
                        <tr>
                          <td>Aktif Mulai</td> 
                          <td>{{$itemGuru->guruAktifM}}</td>
                        </tr>
                        <tr>
                          <td>Aktif Selesai</td> 
                          <td>{{$itemGuru->guruAktifS}}</td>
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

