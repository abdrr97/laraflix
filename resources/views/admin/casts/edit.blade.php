@extends('admin.layouts.master')

@section('content')

<div class="container-fluid page__container mt-5">

    @include('admin.layouts.includes.header',['current'=>'cast','prev'=>'HOME'])

    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 "></div>
            <div class="col-lg-8 card-form__body card-body">
                <form method="POST" action="{{ route('admin.casts.update',['cast'=>$cast]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name">cast Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="cast Name"
                                value="{{ $cast->name }}" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                            placeholder="cast Description">{{ $cast->description }}</textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection