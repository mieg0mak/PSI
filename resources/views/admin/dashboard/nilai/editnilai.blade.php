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
            <div class="col-md-6">
                <div class="box-body flash-message" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p>{{  isset($successMessage) ? $successMessage : '' }}</p>
                     @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Edit Nilai </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                    @foreach($nilai as $itemNilai)
                    <form id="formNilaiEdit" class="form-horizontal" role="form" method="POST" action="{{ url('/datanilai/update') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="kelas" value="{{$itemNilai->mapelKelasId}}">
                      <input type="hidden" name="id" value="{{$itemNilai->nilaiId}}">
                      <div class="form-group">
                          <label class="col-md-4 control-label">ID Guru </label>
                          <div class="col-md-6 @if ($errors->has('nilaiGuruId')) has-error @endif">
                              <input type="text" class="form-control" name="nilaiGuruId" value="{{$itemNilai->nilaiGuruId}}" readonly="true"> 
                              <small class="help-block"></small>
                          </div> 
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">NISN Siswa </label>
                          <div class="col-md-6  @if ($errors->has('nilaiSisNisn')) has-error @endif">
                              <input type="text" class="form-control" name="nilaiSisNisn" value="{{$itemNilai->nilaiSisNisn}}" readonly="true">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Mata Pelajaran </label>
                          <div class="col-md-6  @if ($errors->has('nilaiMapelKode')) has-error @endif">
                              <input type="text" class="form-control" name="nilaiMapelKode" value="{{$itemNilai->nilaiMapelKode}}" readonly="true">
                              <small class="help-block"></small>
                         </div>
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nilai Tugas </label>
                          <div class="col-md-6  @if ($errors->has('nilaiTugas')) has-error @endif">
                              <input type="text" class="form-control" name="nilaiTugas" value="{{$itemNilai->nilaiTugas}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Nilai Ulangan Harian </label>
                          <div class="col-md-6  @if ($errors->has('nilaiUh')) has-error @endif">
                              <input type="text" class="form-control" name="nilaiUh" value="{{$itemNilai->nilaiUh}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Nilai UTS </label>
                          <div class="col-md-6  @if ($errors->has('nilaiUts')) has-error @endif">
                              <input type="text" class="form-control" name="nilaiUts" value="{{$itemNilai->nilaiUts}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Nilai UAS </label>
                          <div class="col-md-6  @if ($errors->has('nilaiUas')) has-error @endif">
                              <input type="text" class="form-control" name="nilaiUas" value="{{$itemNilai->nilaiUas}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Nilai Perilaku </label>
                          <div class="col-md-6  @if ($errors->has('nilaiPerilaku')) has-error @endif">
                              <select class="form-control" name="nilaiPerilaku" value="{{$itemNilai->nilaiPerilaku}}">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                              </select>
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Keterangan </label>
                          <div class="col-md-6  @if ($errors->has('nilaiKeterangan')) has-error @endif">
                              <input type="text" class="form-control" name="nilaiKeterangan" value="{{$itemNilai->nilaiKeterangan}}">
                              <small class="help-block"></small>
                         </div>
                      </div>
   
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ action('Nilai\NilaiController@index') }}}" title="Cancel">
                              <button type="button" class="btn btn-default" id="button-reg">
                                  Cancel
                              </button>
                              </a>  
                          </div>
                      </div>
                      </form>
                      @endforeach
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->
            
@endsection

