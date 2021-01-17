@extends('admin.layouts.master')

@section('content')

<div class="container-fluid page__container mt-5">

    @include('admin.layouts.includes.header',['current'=>'MOVIE GENRE','prev'=>'HOME'])

    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 "></div>
            <div class="col-lg-8 card-form__body card-body">
                <form method="POST" action="{{ route('admin.genres.update',['genre'=>$genre]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name">Genre Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Genre Name"
                                value="{{ $genre->name }}" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                            placeholder="Genre Description">{{ $genre->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                            <input name="status" @if ($genre->status) checked @endif type="checkbox" id="status"
                            class="custom-control-input">
                            <label class="custom-control-label mb-0" for="status">Yes</label>
                        </div>
                        <label for="status" class="mb-0">Yes</label>
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('scripts')

<script>
    $(document).ready(function () {
        
        $('input#name').on('input',function (e) {
            $('input#slug').val(convertToSlug(e.target.value));
        })
        
        function convertToSlug(Text)
        {
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-');
        }
    });

</script>

@endsection --}}