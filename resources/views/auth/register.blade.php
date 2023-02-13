@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nm_petugas') ? ' has-error' : '' }}">
                            <label for="nm_petugas" class="col-md-4 control-label">Nama Petugas</label>

                            <div class="col-md-6">
                                <input id="nm_petugas" type="text" class="form-control" name="nm_petugas" value="{{ old('nm_petugas') }}" required autofocus>

                                @if ($errors->has('nm_petugas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nm_petugas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_telepon') ? ' has-error' : '' }}">
                            <label for="no_telepon" class="col-md-4 control-label">No Telepon</label>

                            <div class="col-md-6">
                                <input id="no_telepon" type="text" class="form-control" name="no_telepon" value="{{ old('no_telepon') }}" required autofocus>

                                @if ($errors->has('no_telepon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_telepon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Level</label>

                            <div class="col-md-6">
                                <select class="form-control" name="level">
                                  <option value="admin">Admin</option>
                                  <option value="kasir">Kasir</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
