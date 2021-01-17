@extends('admin.layouts.master')


@section('content')
<div class="container-fluid page__container">

    <div class="card card-form">
        <div class="card-header">
            @include('admin.layouts.includes.header' , ['prev'=>'permission','current'=>$title])
            <a class="btn btn-primary m-3" href="{{ route('admin.permission.index') }}">
                <i class="fa fa-arrow-left"></i> BACK
            </a>
        </div>

        <div class="row no-gutters">
            <div class="col-lg-4 card-body"></div>
            <div class="col-lg-8 card-form__body card-body">

                <form method="POST" action="{{ route('admin.permission.update', $permission) }}" data-parsley-validate>
                    @method('PUT')
                    @csrf
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name</label>
                        <input disabled type="text" value="{{$permission->name}}" id="name" name="name"
                            class="form-control">
                        @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                        <label for="display_name">Display Name</label>
                        <input type="text" value="{{ $permission->display_name }}" id="display_name" name="display_name"
                            class="form-control">
                        @if ($errors->has('display_name'))
                        <span class="help-block">{{ $errors->first('display_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">
                        {{ $permission->description }}
                    </textarea>
                        @if ($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Save Permission Changes</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection