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
                    @if(Auth::user()->level==1)
                      <a href="{{{ URL::to('absensi/tambah') }}}" class="btn btn-success btn-flat btn-sm" data-toggle="modal" title="Tambah"><i class="fa fa-plus"></i></a>
                    @endif
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataAbsensi" class="table table-bordered table-hover">
                    <thead>
                      <tr>                        
                        <th>NISN</th>
                        <th>NIS</th>                    
                        <th>Nama</th>                            
                        <th>Kelas</th>                        
                        <th>Angkatan</th>
                        <th>Kehadiran</th>
                        <th>Aksi</th> 
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($absensi as $itemAbsensi):  ?>
                      <tr>
                        <td>{{$itemAbsensi->sisNisn}}</td>
                        <td>{{$itemAbsensi->sisNis}}</td>
                        <td>{{$itemAbsensi->sisNama}}</td>
                        <td>{{$itemAbsensi->sisKelasKode}}</td> 
                        <td>{{$itemAbsensi->sisAngkatan}}</td> 
                        <td>Hadir</td>
                          <td><a onClick="tampilModal('{{$itemAbsensi->sisNisn}}','{{$itemAbsensi->sisNama}}','{{$itemAbsensi->sisKelasKode}}')" id="registerAbsensi{{{$itemAbsensi->sisNisn}}}" title="Register">
                              <span class="label label-info"><i class="fa fa-list"> Edit </i></span>
                              </a>
                          </td>
                      </tr>
                      <?php endforeach  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>NISN</th>
                        <th>NIS</th>                    
                        <th>Nama</th>                            
                        <th>Kelas</th>
                        <th>Angkatan</th>                      
                        <th>Kehadiran</th>
                        <th>Aksi</th> 
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->


          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title" id="myModalLabel">Register Absensi - Edit</h4>
                      </div>
                      <div class="modal-body">
           
                          <form id="formRegisterAbsensi" class="form-horizontal" role="form" method="POST" action="{{ url('/absensi/tambah') }}">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                              <div class="form-group">
                                  <label class="col-md-4 control-label">ID Guru</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" id="absensiGuruId" name="absensiGuruId" readonly="true">
                                      <small class="help-block"></small>
                                  </div>
                              </div>           
                              <div class="form-group">
                                  <label class="col-md-4 control-label">NISN Siswa</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" id="absensiSisNisn" name="absensiSisNisn" readonly="true">
                                      <small class="help-block"></small>
                                  </div>
                              </div>           
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Kelas</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" id="absensiKelasId" name="absensiKelasId" readonly="true">
                                      <small class="help-block"></small>
                                  </div>
                              </div>  
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Tanggal</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" id="absensiTanggal" name="absensiTanggal">
                                      <small class="help-block"></small>
                                  </div>
                              </div>       
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Status</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" id="absensiStatus" name="absensiStatus">
                                      <small class="help-block"></small>
                                  </div>
                              </div>     

                              <div class="form-group">
                                  <label class="col-md-4 control-label">Keterangan</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" id="absensiKeterangan" name="absensiKeterangan">
                                      <small class="help-block"></small>
                                  </div>
                              </div> 
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      <button type="submit" class="btn btn-primary" id="button-reg">
                                          Simpan
                                      </button>
                                  </div>
                              </div>
                          </form>                       
           
                      </div>
                  </div>
              </div>
          </div>
          <!--end of Modal -->           

@endsection
@section('script')

    <script src="{{ URL::asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
      $(function () {

        $('#dataAbsensi').DataTable({"pageLength": 10});

      });

      function tampilModal(sisNisn,guruId,sisKelasKode){
        //alert(level);
        $('input+small').text('');
        $('input').parent().removeClass('has-error');
        $('select').parent().removeClass('has-error');

        document.getElementById('absensiGuruId').value=guruId;
        document.getElementById('absensiSisNisn').value=sisNisn;
        document.getElementById('absensiKelasId').value=sisKelasKode;
        document.getElementById('absensiTanggal').value=date_time_set;

        //$('#nama').val()=nama;
        $('#myModal').modal('show');
            //console.log('test');
        return false;
      };

      $(document).on('submit', '#formRegisterAbsensi', function(e) {  
            //variabel url diambil dari meta data di header template
            var url = document.getElementsByName('base_url')[0].getAttribute('content')
            e.preventDefault();
             
            $('input+small').text('');
            $('input').parent().removeClass('has-error');           
             
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json"
            })
            .done(function(data) {
                console.log(data);
                
                $('.alert-success').removeClass('hidden');
                $('#myModal').modal('hide');
                
                window.location.href=url+'/datasiswa'; 
            })
            .fail(function(data) {
                console.log(data.responeJSON);
                $.each(data.responseJSON, function (key, value) {
                    var input = '#formRegisterAbsensi input[name=' + key + ']';
                    
                    $(input + '+small').text(value);
                    $(input).parent().addClass('has-error');
                });
            });
        });

    </script>

@endsection

