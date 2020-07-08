@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Pustakawan</li>
            <li class="active">Detail Pustakawan</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pustakawan</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                 <?php foreach ($pustakawan as $itemPustakawan);  ?>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-3">
                      <p align="center">
                        <img src="{{ URL::asset('admin/dist/img/user-160-nobody.jpg') }}" alt="User Image">
                        <a class="users-list-name" href="#">{{$itemPustakawan->pusNama}}</a>
                        <span class="users-list-date">Pustakawan Tetap</span>
                      </p>
                    </div><!-- /.col -->
                    <div class="col-md-8">
                     <table id="dataPustakawan" class="table table-bordered table-hover">                    
                      <tbody>
                        <tr>
                          <td>NIP</td>  
                          <td>{{$itemPustakawan->pusNip}}</td>
                        </tr>
                        <tr>
                          <td>Nama</td> 
                          <td>{{$itemPustakawan->pusNama}}</td>
                        </tr>
                        <tr>
                          <td>JK</td> 
                          <td>{{$itemPustakawan->pusJk}}</td>
                        </tr>
                        <tr>
                          <td>TTL</td> 
                          <td>{{$itemPustakawan->pusTtl}}</td>
                        </tr>
                        <tr>
                          <td>Alamat</td> 
                          <td>{{$itemPustakawan->pusAlamat}}</td>
                        </tr>
                        <tr>
                          <td>Aktif Mulai</td> 
                          <td>{{$itemPustakawan->pusAktifM}}</td>
                        </tr>
                        <tr>
                          <td>Aktif Selesai</td> 
                          <td>{{$itemPustakawan->pusAktifS}}</td>
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

