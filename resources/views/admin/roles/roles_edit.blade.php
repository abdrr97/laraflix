@extends('admin.layouts.master')

@section('content')
<div class="card card-form">
    <div class="card-header">
        @include('admin.layouts.includes.header' , ['prev'=>'roles','current'=>$title])
        <a class="btn btn-primary m-3" href="{{ route('admin.roles.index') }}">
            <i class="fa fa-arrow-left"></i> BACK
        </a>
    </div>
    <div class="row no-gutters">
        <div class="col-lg-4 card-body"></div>
        <div class="col-lg-8 card-form__body card-body">
            <form method="POST" action="{{ route('admin.roles.update', $role) }}" data-parsley-validate>
                @method('PUT')
                @csrf
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>

                    <input disabled type="text" value="{{$role->name}}" id="name" name="name" class="form-control ">
                    @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                    <label for="display_name">Display Name</label>

                    <input type="text" value="{{ $role->display_name }}" id="display_name" name="display_name"
                        class="form-control ">
                    @if ($errors->has('display_name'))
                    <span class="help-block">{{ $errors->first('display_name') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>

                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                        {{ $role->description }}
                    </textarea>

                    @if ($errors->has('description'))
                    <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('permission_id') ? ' has-error' : '' }}">
                    <label for="permission_id">Permission</label>

                    @isset($permissions)
                    <div class="row">
                        @foreach($permissions as $perm)
                        <div class="col-3 custom-control custom-checkbox">
                            <input name="permission_id[]" value="{{ $perm->id }}" class="custom-control-input"
                                type="checkbox" id="{{ $perm->id }}" @if ($role_permissions->contains($perm->id))
                            checked @endif>
                            <label class="custom-control-label" for="{{ $perm->id }}">
                                {{ $perm->display_name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @endisset

                    @if ($errors->has('permission_id'))
                    <span class="help-block">{{ $errors->first('permission_id') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Save Role Changes</button>
            </form>
        </div>
    </div>
</div>




@endsection