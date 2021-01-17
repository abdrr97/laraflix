@extends('admin.layouts.master')

@section('content')

<div class="container-fluid page__container">
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
                <form method="post" action="{{ route('admin.roles.store') }}">
                    @csrf

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name</label>

                        <input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name"
                            class="form-control">
                        @if ($errors->has('name'))
                        <span class=" help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                        <label for="display_name">Display Name</label>

                        <input type="text" value="{{ Request::old('display_name') ?: '' }}" id="display_name"
                            name="display_name" class="form-control">
                        @if ($errors->has('display_name'))
                        {{-- <small class="text-danger"> {{ $errors->first('display_name') }} </small> --}}
                        <span class=" help-block">{{ $errors->first('display_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">description</label>

                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                            {{ old('description') ? : '' }}
                        </textarea>
                        {{-- <input type="text" value="{{ Request::old('description') ?: '' }}" id="description"
                        name="description" class="form-control"> --}}
                        @if ($errors->has('description'))
                        <span class=" help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Create Role</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection