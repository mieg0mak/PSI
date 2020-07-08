@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Kepala Sekolah</li>
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
                    <h3 class="box-title">Tambah Kepala Sekolah </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                    <form id="formKepsekTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/kepsek/tambahkepsek') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">NIP </label>
                          <div class="col-md-6 @if ($errors->has('kepsekNip')) has-error @endif">
                              <input type="number" class="form-control" name="kepsekNip" value="{{Request::old('kepsekNip')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nama </label>
                          <div class="col-md-6  @if ($errors->has('kepsekNama')) has-error @endif">
                              <input type="text" class="form-control" name="kepsekNama" value="{{Request::old('kepsekNama')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Email </label>
                          <div class="col-md-6  @if ($errors->has('kepsekEmail')) has-error @endif">
                              <input type="text" class="form-control" name="kepsekEmail" value="{{Request::old('kepsekEmail')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Jenis Kelamin </label>
                          <div class="col-md-6  @if ($errors->has('kepsekJk')) has-error @endif">
                              <select class="form-control" name="kepsekJk" value="{{Request::old('kepsekJk')}}">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">TTL </label>
                          <div class="col-md-6  @if ($errors->has('kepsekTtl')) has-error @endif">
                              <input type="date" class="form-control" name="kepsekTtl" value="{{Request::old('kepsekTtl')}}" required>
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Alamat </label>
                          <div class="col-md-6  @if ($errors->has('kepsekAlamat')) has-error @endif">
                              <input type="text" class="form-control" name="kepsekAlamat" value="{{Request::old('kepsekAlamat')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Aktif Mulai </label>
                          <div class="col-md-6  @if ($errors->has('kepsekAktifM')) has-error @endif">
                              <input type="date" class="form-control" name="kepsekAktifM" value="{{Request::old('kepsekAktifM')}}" required>
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Aktif Sampai </label>
                          <div class="col-md-6  @if ($errors->has('kepsekAktifS')) has-error @endif">
                              <input type="date" class="form-control" name="kepsekAktifS" value="{{Request::old('kepsekAktifS')}}" required>
                              <small class="help-block"></small>
                         </div>
                      </div>

   
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ action('Kepsek\KepsekController@index') }}}" title="Cancel">
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

