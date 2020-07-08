@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Nilai</li>
            <li class="active">Detail Nilai</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Nilai</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                 <?php foreach ($nilai as $itemNilai);  ?>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-1">
                      
                    </div><!-- /.col -->
                    <div class="col-md-8">
                     <table id="dataKurikulum" class="table table-bordered table-hover">                    
                      <tbody>
                        <tr>
                          <td>Guru Wali</td>  
                          <td>{{$itemNilai->guruNama}}</td>
                        </tr>
                        <tr>
                          <td>Siswa</td> 
                          <td>{{$itemNilai->sisNama}}</td>
                        </tr>
                        <tr>
                          <td>Mata Pelajaran</td> 
                          <td>{{$itemNilai->nilaiMapelKode}}</td>
                        </tr>
                        <tr>
                          <td>Ulangan Harian</td> 
                          <td>{{$itemNilai->nilaiUh}}</td>
                        </tr>
                        <tr>
                          <td>UTS</td> 
                          <td>{{$itemNilai->nilaiUts}}</td>
                        </tr>
                        <tr>
                          <td>UAS</td> 
                          <td>{{$itemNilai->nilaiUas}}</td>
                        </tr>
                        <tr>
                          <td>Perilaku</td> 
                          <td>{{$itemNilai->nilaiPerilaku}}</td>
                        </tr>
                        <tr>
                          <td>Keterangan</td> 
                          <td>{{$itemNilai->nilaiKeterangan}}</td>
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

