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
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Nilai</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataNilai" class="table table-bordered table-hover">
                    <thead>
                      <tr>                        
                        <th>Guru Wali</th>                    
                        <th>Siswa</th>
                        <th>Mata Pelajaran</th>                        
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Perilaku</th>
                        <th>Keterangan</th>
                        <th>Aksi</th> 
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($nilai as $itemNilai):  ?>
                      <tr>
                        <td>{{$itemNilai->guruNama}}</td>
                        <td>{{$itemNilai->sisNama}}</td>
                        <td>{{$itemNilai->nilaiMapelKode}}</td>
                        <td>{{$itemNilai->nilaiUts}}</td>
                        <td>{{$itemNilai->nilaiUas}}</td> 
                        <td>{{$itemNilai->nilaiPerilaku}}</td>
                        <td>{{$itemNilai->nilaiKeterangan}}</td>
                        @if(Auth::user()->level==1)
                          <td><a href="{{{ URL::to('nilai/'.$itemNilai->nilaiId.'/detail') }}}">
                              <span class="label label-info"><i class="fa fa-list"> Detail </i></span>
                              </a>
                          </td>
                        @else
                          <td><a href="{{{ URL::to('datanilai/'.$itemNilai->nilaiId.'/detail') }}}">
                              <span class="label label-info"><i class="fa fa-list"> Detail </i></span>
                              </a>
                              <a href="{{{ URL::to('datanilai/'.$itemNilai->nilaiId.'/edit') }}}">
                              <span class="label label-warning"><i class="fa fa-list"> Edit </i></span>
                              </a>
                          </td>
                        @endif
                      </tr>
                      <?php endforeach  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Guru Wali</th>                    
                        <th>Siswa</th>
                        <th>Mata Pelajaran</th>                        
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Perilaku</th>
                        <th>Keterangan</th>
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
                          <h4 class="modal-title" id="myModalLabel">Data Nilai - Edit</h4>
                      </div>
                      <div class="modal-body">
           
                          <form id="formRegisterNilai" class="form-horizontal" role="form" method="POST" action="{{ url('/datanilai/edit') }}">
                              <div class="form-group">
                                  <label class="col-md-4 control-label">ID Guru</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" id="nilaiGuruId" name="nilaiGuruId" readonly="true">
                                      <small class="help-block"></small>
                                  </div>
                              </div>           
                              <div class="form-group">
                                  <label class="col-md-4 control-label">NISN Siswa</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" id="nilaiSisNisn" name="nilaiSisNisn" readonly="true">
                                      <small class="help-block"></small>
                                  </div>
                              </div>           
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Kode Mata Pelajaran</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" id="nilaiMapelKode" name="nilaiMapelKode" readonly="true">
                                      <small class="help-block"></small>
                                  </div>
                              </div>  
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Nilai Tugas</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" id="nilaiTugas" name="nilaiTugas">
                                      <small class="help-block"></small>
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Nilai Ulangan Harian</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" id="nilaiUh" name="nilaiUh">
                                      <small class="help-block"></small>
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Nilai UTS</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" id="nilaiUts" name="nilaiUts">
                                      <small class="help-block"></small>
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Nilai UAS</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" id="nilaiUas" name="nilaiUas">
                                      <small class="help-block"></small>
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Nilai Perilaku</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" id="nilaiPerilaku" name="nilaiPerilaku">
                                      <small class="help-block"></small>
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Keterangan</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" id="nilaiKeterangan" name="nilaiKeterangan">
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

        $('#dataNilai').DataTable({"pageLength": 10});

      });

      function tampilModal(nilaiGuruId,nilaiSisNisn,nilaiMapelKode,nilaiTugas,nilaiUh,nilaiUts,nilaiUas,nilaiPerilaku,nilaiKeterangan){
        //alert(level);
        $('input+small').text('');
        $('input').parent().removeClass('has-error');
        $('select').parent().removeClass('has-error');

        document.getElementById('nilaiGuruId').value=nilaiGuruId;
        document.getElementById('nilaiSisNisn').value=nilaiSisNisn;
        document.getElementById('nilaiMapelKode').value=nilaiMapelKode;
        document.getElementById('nilaiTugas').value=nilaiTugas;
        document.getElementById('nilaiUh').value=nilaiUh;
        document.getElementById('nilaiUts').value=nilaiUts;
        document.getElementById('nilaiUas').value=nilaiUas;
        document.getElementById('nilaiPerilaku').value=nilaiPerilaku;
        document.getElementById('nilaiKeterangan').value=nilaiKeterangan;

        //$('#nama').val()=nama;
        $('#myModal').modal('show');
            //console.log('test');
        return false;
      };

      $(document).on('submit', '#formRegisterNilai', function(e) {  
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
                    var input = '#formRegisterNilai input[name=' + key + ']';
                    
                    $(input + '+small').text(value);
                    $(input).parent().addClass('has-error');
                });
            });
        });

    </script>

@endsection

