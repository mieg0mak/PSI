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
            <li class="active">Detail Mata Pelajaran</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Mata Pelajaran</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                 <?php foreach ($mapel as $itemMapel);  ?>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-3">
                      <p align="center">
                        <img src="{{ URL::asset('admin/dist/img/book.jpg') }}" alt="User Image">
                        <a class="users-list-name" href="#">{{$itemMapel->mapelNama}}</a>
                        <span class="users-list-date">Mata Pelajaran Tetap</span>
                      </p>
                    </div><!-- /.col -->
                    <div class="col-md-8">
                     <table id="dataKurikulum" class="table table-bordered table-hover">                    
                      <tbody>
                      
                        <tr>
                          <td>Kode Mata Pelajaran</td>  
                          <td>{{$itemMapel->mapelKode}}</td>
                        </tr>
                        <tr>
                          <td>Nama Mata Pelajaran</td> 
                          <td>{{$itemMapel->mapelNama}}</td>
                        </tr>
                        <!--<tr>
                          <td>Guru Wali</td> 
                          <td>{{$itemMapel->guruNama}}</td>
                        </tr>-->
                        <tr>
                          <td>Kurikulum</td> 
                          <td>{{$itemMapel->kurTahun}}</td>
                        </tr>
                        <tr>
                          <td>Kelas</td> 
                          <td>{{$itemMapel->mapelKelasId}}</td>
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

