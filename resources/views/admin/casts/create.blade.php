@extends('admin.layouts.master')

@section('content')

<div class="container-fluid page__container mt-5">

    @include('admin.layouts.includes.header',['current'=>'MOVIE cast','prev'=>'HOME'])

    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 "></div>
            <div class="col-lg-8 card-form__body card-body">
                <form method="POST" action="{{ route('admin.casts.store') }}">
                    @csrf

                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name">cast Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="cast Name"
                                value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                            placeholder="cast Description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="movies">Movies</label>
                        <select multiple="multiple" name="movies[]" id="movies" data-toggle="select"
                            class="js-example-basic-multiple js-states form-control">
                            @foreach ($movies as $movie)
                            <option value="{{ $movie->id }}">{{ $movie->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
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
    $(document).ready(function() {
        $('select#maturity-ratings').select2();
    });
</script>
@endsection