@extends('admin.layouts.master')

@section('content')

@include('admin.layouts.includes.header' , ['prev'=>'permission','current'=>$title])

<div class="container-fluid page__container">

    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body"></div>
            <div class="col-lg-8 card-form__body card-body">
                <form method="post" action="{{ route('admin.permission.store') }}">
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? 'is-invalid ' : '' }}">
                        <label for="name">Name</label>
                        <input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name"
                            class="form-control" required placeholder="Permission Name">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('display_name') ? 'is-invalid' : '' }}">
                        <label for="display_name">Display Name</label>
                        <input type="text" value="{{ Request::old('display_name') ?: '' }}" id="display_name"
                            name="display_name" class="form-control " placeholder="Permission Display Name">
                        @if($errors->has('display_name'))
                        <span class="invalid-feedback">{{ $errors->first('display_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'is-invalid' : '' }}">
                        <label for="description">description</label>
                        <input type="text" value="{{ Request::old('description') ?: '' }}" id="description"
                            name="description" class="form-control " placeholder="Permission Description">
                        @if ($errors->has('description'))
                        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success">Create Permission</button>
                </form>
            </div>
        </div>
    </div>


</div>

@endsection