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
                    <h3 class="box-title">Tambah Pustakawan </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                    <form id="formPustakawanTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/pustakawan/tambahpustakawan') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">NIP </label>
                          <div class="col-md-6 @if ($errors->has('pusNip')) has-error @endif">
                              <input type="text" class="form-control" name="pusNip" value="{{Request::old('pusNip')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nama </label>
                          <div class="col-md-6  @if ($errors->has('pusNama')) has-error @endif">
                              <input type="text" class="form-control" name="pusNama" value="{{Request::old('pusNama')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Email </label>
                          <div class="col-md-6  @if ($errors->has('pusEmail')) has-error @endif">
                              <input type="text" class="form-control" name="pusEmail" value="{{Request::old('pusEmail')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Jenis Kelamin </label>
                          <div class="col-md-6  @if ($errors->has('pusJk')) has-error @endif">
                              <select class="form-control" name="pusJk" value="{{Request::old('pusJk')}}">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">TTL </label>
                          <div class="col-md-6  @if ($errors->has('pusTtl')) has-error @endif">
                              <input type="date" class="form-control" name="pusTtl" value="{{Request::old('pusTtl')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Alamat </label>
                          <div class="col-md-6  @if ($errors->has('pusAlamat')) has-error @endif">
                              <input type="text" class="form-control" name="pusAlamat" value="{{Request::old('pusAlamat')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Aktif Mulai </label>
                          <div class="col-md-6  @if ($errors->has('pusAktifM')) has-error @endif">
                              <input type="date" class="form-control" name="pusAktifM" value="{{Request::old('pusAktifM')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Aktif Sampai </label>
                          <div class="col-md-6  @if ($errors->has('pusAktifS')) has-error @endif">
                              <input type="date" class="form-control" name="pusAktifS" value="{{Request::old('pusAktifS')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

   
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ action('Pustakawan\PustakawanController@index') }}}" title="Cancel">
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

