@extends('admin.layouts.master')

@section('content')
<div class="container-fluid page__container">

    <div class="card card-form">
        <div class="card-header">
            @include('admin.layouts.includes.header' , ['prev'=>'users','current'=>$title])
        </div>
        <div class="row no-gutters">
            <div class="col-lg-4 card-body"></div>
            <div class="col-lg-8 card-form__body card-body">
                <form method="POST" action="{{ route('admin.users.store') }}" data-parsley-validate>
                    @csrf
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username">Username</label>
                        <input type="text" value="{{ Request::old('username') ?: '' }}" id="username" name="username"
                            class="form-control col-md-7 col-xs-12">
                        @if ($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input type="text" value="{{ Request::old('email') ?: '' }}" id="email" name="email"
                            class="form-control col-md-7 col-xs-12">
                        @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password</label>
                        <input type="password" value="{{ Request::old('password') ?: '' }}" id="password"
                            name="password" class="form-control col-md-7 col-xs-12">
                        @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" value="{{ Request::old('confirm_password') ?: '' }}"
                            id="confirm_password" name="confirm_password" class="form-control col-md-7 col-xs-12">
                        @if($errors->has('confirm_password'))
                        <span class="help-block">{{ $errors->first('confirm_password') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }} ">
                        <label for="category_id">Role</label>
                        <select class="form-control " data-toggle="select" id="role_id" name="role_id">
                            @isset($roles)
                            @foreach($roles as $row)
                            <option value="{{$row->id}}">{{$row->display_name}}</option>
                            @endforeach
                            @endisset
                        </select>
                        @if ($errors->has('role_id'))
                        <span class="help-block">{{ $errors->first('role_id') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Create User</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('styles')
<link href="{{ asset('backend/css/vendor-select2.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendor/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@section('scripts')
<script src="{{ asset('backend/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend/js/select2.js') }}"></script>
@endsection