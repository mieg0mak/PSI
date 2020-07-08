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
                    <h3 class="box-title">Tambah Siswa </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                    <form id="formSiswaTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/siswa/tambahsiswa') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">NISN </label>
                          <div class="col-md-6 @if ($errors->has('sisNisn')) has-error @endif">
                              <input type="text" class="form-control" name="sisNisn" value="{{Request::old('sisNisn')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">NIS </label>
                          <div class="col-md-6 @if ($errors->has('sisNis')) has-error @endif">
                              <input type="text" class="form-control" name="sisNis" value="{{Request::old('sisNis')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nama </label>
                          <div class="col-md-6  @if ($errors->has('sisNama')) has-error @endif">
                              <input type="text" class="form-control" name="sisNama" value="{{Request::old('sisNama')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Email </label>
                          <div class="col-md-6  @if ($errors->has('sisEmail')) has-error @endif">
                              <input type="text" class="form-control" name="sisEmail" value="{{Request::old('sisEmail')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Jenis Kelamin </label>
                          <div class="col-md-6  @if ($errors->has('sisJk')) has-error @endif">
                              <select class="form-control" name="sisJk" value="{{Request::old('sisJk')}}">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">TTL </label>
                          <div class="col-md-6  @if ($errors->has('sisTtl')) has-error @endif">
                              <input type="date" class="form-control" name="sisTtl" value="{{Request::old('sisTtl')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Alamat </label>
                          <div class="col-md-6  @if ($errors->has('sisAlamat')) has-error @endif">
                              <input type="text" class="form-control" name="sisAlamat" value="{{Request::old('sisAlamat')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Kelas </label>
                          <div class="col-md-6  @if ($errors->has('sisKelasKode')) has-error @endif">
                              <select class="form-control" name="sisKelasKode" value="{{Request::old('sisKelasKode')}}">
                                <option value="1">Kelas 1</option>
                                <option value="2">Kelas 2</option>
                                <option value="3">Kelas 3</option>
                                <option value="4">Kelas 4</option>
                                <option value="5">Kelas 5</option>
                                <option value="6">Kelas 6</option>
                              </select>
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Angkatan </label>
                          <div class="col-md-6  @if ($errors->has('sisAngkatan')) has-error @endif">
                              <input type="text" class="form-control" name="sisAngkatan" value="{{Request::old('sisAngkatan')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>
   
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <input type="hidden" class="form-control" name="sisStatusAktif" value="1">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ action('Siswa\SiswaController@index') }}}" title="Cancel">
                              <button type="button" class="btn btn-default" id="button-reg">
                                  Cancel
                              </button>
                              </a>  
                          </div>
                      </div>
                      </form>   
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->
            
@endsection

