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
                    <h3 class="box-title">Tambah Guru </h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                    <form id="formGuruTambah" class="form-horizontal" role="form" method="POST" action="{{ url('/guru/tambahguru') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">NIP </label>
                          <div class="col-md-6 @if ($errors->has('guruNip')) has-error @endif">
                              <input type="number" class="form-control" name="guruNip" value="{{Request::old('guruNip')}}">
                              <small class="help-block"></small>
                          </div> 
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nama </label>
                          <div class="col-md-6  @if ($errors->has('guruNama')) has-error @endif">
                              <input type="text" class="form-control" name="guruNama" value="{{Request::old('guruNama')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Email </label>
                          <div class="col-md-6  @if ($errors->has('guruEmail')) has-error @endif">
                              <input type="email" class="form-control" name="guruEmail" value="{{Request::old('guruEmail')}}" multiple>
                              <small class="help-block"></small>
                         </div>
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Jenis Kelamin </label>
                          <div class="col-md-6  @if ($errors->has('guruJk')) has-error @endif">
                              <select class="form-control" name="guruJk" value="{{Request::old('guruJk')}}">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label" required>TTL </label>
                          <div class="col-md-6  @if ($errors->has('guruTtl')) has-error @endif">
                              <input type="date" class="form-control" name="guruTtl" value="{{Request::old('guruTtl')}}" required>
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Alamat </label>
                          <div class="col-md-6  @if ($errors->has('guruAlamat')) has-error @endif">
                              <input type="text" class="form-control" name="guruAlamat" value="{{Request::old('guruAlamat')}}">
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Wali Kelas </label>
                          <div class="col-md-6  @if ($errors->has('guruKelasKode')) has-error @endif">
                              <select class="form-control" name="guruKelasKode" value="{{Request::old('guruKelasKode')}}">
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
                          <label class="col-md-4 control-label">Aktif Mulai </label>
                          <div class="col-md-6  @if ($errors->has('guruAktifM')) has-error @endif">
                              <input type="date" class="form-control" name="guruAktifM" value="{{Request::old('guruAktifM')}}" required>
                              <small class="help-block"></small>
                         </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Aktif Sampai </label>
                          <div class="col-md-6  @if ($errors->has('guruAktifS')) has-error @endif">
                              <input type="date" class="form-control" name="guruAktifS" value="{{Request::old('guruAktifS')}}" required>
                              <small class="help-block"></small>
                         </div>
                      </div>

   
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              
                              <a href="{{{ action('Guru\GuruController@index') }}}" title="Cancel">
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

