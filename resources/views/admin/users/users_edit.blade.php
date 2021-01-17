@extends('admin.layouts.master')

@section('content')
<div class="container-fluid page__container">

    <div class="card card-form">
        <div class="card-header">
            @include('admin.layouts.includes.header' , ['prev'=>'Users','current'=>$title])
            <a class="btn btn-primary m-3" href="{{ route('admin.index') }}">
                <i class="fa fa-arrow-left"></i> BACK
            </a>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-4 card-body"></div>
            <div class="col-lg-8 card-form__body card-body">
                <form method="POST" action="{{ route('admin.users.update_role', $user) }}" data-parsley-validate>
                    @csrf
                    @method('PUT')

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Username</label>
                        <input type="text" value="{{$user->username}}" id="name" name="username" class="form-control">
                        @if ($errors->has('name'))
                        <span class="help-block"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input type="text" value="{{ $user->email }}" id="email" name="email" class="form-control">
                        @if ($errors->has('email'))
                        <span class="help-block"> {{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">
                        <label for="category_id">Role </label>
                        <select class="form-control" data-toggle="select" id="role_id" name="role_id">
                            @isset($roles)
                            @foreach($roles as $role)
                            <option @if ($user->roles->first()->id == $role->id) selected @endif
                                value="{{ $role->id }}">{{ $role->display_name }}</option>
                            @endforeach
                            @endisset
                        </select>
                        @if ($errors->has('role_id'))
                        <span class="help-block"> {{ $errors->first('role_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group flex">
                        <label for="subscribe">Is User Banned</label><br>
                        <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                            <input value="" @isset($user->banned_until) checked @endisset
                            type="checkbox" id="is_banned" class="custom-control-input">
                            <label class="custom-control-label" for="is_banned">Yes</label>
                        </div>
                        <label for="subscribe" class="mb-0">Yes</label>
                    </div>

                    <div class="form-group" id="banned_section" @if(!isset($user->banned_until)) style="display:none"
                        @endif>
                        <label class="text-label" for="banned_until">banned until</label>
                        <input name="banned_until" id="banned_until" type="datetime" class="form-control"
                            data-toggle="flatpickr" data-flatpickr-enable-time="true" data-flatpickr-min-date="today"
                            data-flatpickr-alt-format="F j, Y at H:i" data-flatpickr-date-format="Y-m-d H:i"
                            value="@if(isset($user->banned_until)) {{ $user->banned_until }} @else {{ now() }} @endif">
                    </div>

                    <button type="submit" class="btn btn-success">Save User Changes</button>
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

<script>
    $('input#is_banned').change(function (e) {
        if (!e.target.value) {
            $('#banned_until').val(null);
        } else{
            console.log('dd');
            
            console.log($('#banned_until').val() == null);
            if ($('#banned_until').val() == null) {
                console.log('heh');
            }
        }
        $('.form-group#banned_section').toggle();
    });
</script>

@endsection