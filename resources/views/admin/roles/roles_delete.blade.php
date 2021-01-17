@extends('admin.layouts.master')

@section('content')
<div class="container-fluid page__container">

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Roles</h1>
        </div>
        <a class="btn btn-sm btn-primary" href="{{ route('admin.roles.index') }}">Back</a>
        <h2>{{ $title }}</h2>
        <div class="clearfix"></div>

        <p>Are you sure you want to delete <strong>{{ $role->name }}</strong></p>

        <form method="POST" action="{{ route('admin.roles.destroy', $role) }}">
            {{ method_field('DELETE') }}
            @csrf
            <button type="submit" class="btn btn-danger">Yes I'm sure. Delete</button>
        </form>
    </main>
</div>

@endsection