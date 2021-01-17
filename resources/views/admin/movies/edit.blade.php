@extends('admin.layouts.master')


@section('content')

<div class="container-fluid page__container mt-5">
    <div class="card card-form">
        <div class="card-header">
            @include('admin.layouts.includes.header' , ['prev'=>'movies', 'current'=>'update movie'])
        </div>

        <form action="{{ route('admin.movies.update', ['movie'=>$movie]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row no-gutters">

                <div class="col-lg-8 card-form__body card-body">
                    <div class="form-group">
                        <label>Movie Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Movie Name"
                            value="{{ $movie->name }}">
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input id="year" name="year" type="number" class="form-control" placeholder="Movie Year"
                                    value="{{ $movie->year }}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="genres">movie Genres</label>
                                <select multiple="multiple" name="genres[]" id="genres" data-toggle="select"
                                    class="js-example-basic-multiple js-states form-control">
                                    @foreach ($genres as $genre)
                                    <option
                                        {{ $movie->genres()->get()->contains('name',$genre->name) ? 'selected' : '' }}
                                        value="{{ $genre->id }}">{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="casts">Casts</label>
                                <select multiple="multiple" name="casts[]" id="casts" data-toggle="select"
                                    class="js-example-basic-multiple js-states form-control">
                                    @foreach ($casts as $cast)
                                    <option
                                        {{ ($movie->casts()->get()->contains('name',$cast->name)) ? 'selected' : ''  }}
                                        value="{{ $cast->id }}">{{ $cast->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="quality">Quality</label>
                                <select data-toggle="select" name="quality" id="quality" class="form-control">
                                    <option @if ($movie->quality == 'HD') selected @endif value="HD">HD</option>
                                    <option @if ($movie->quality == 'FULL HD') selected @endif value="FULL HD">
                                        FULL HD
                                    </option>
                                    <option @if ($movie->quality == '4K') selected @endif value="4K">4K</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Rate</label>
                                <select data-toggle="select" class="form-control" name="rate" id="rate">
                                    @foreach (range(1,10) as $n)
                                    <option {{ $movie->rate == $n ? 'selected' : '' }} value="{{ $n }}">
                                        {{ $n }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cover">movie Cover</label>
                        <div class="custom-file">
                            <input type="file" accept="images/*" class="custom-file-input" name="cover" id="cover">
                            <label class="custom-file-label" for="cover">Choose file</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="maturity-ratings">Maturity Ratings</label>
                                <select name="maturity_ratings" id="maturity-ratings" data-toggle="select"
                                    class="form-control">
                                    <option value="G" {{ $movie->maturity_rating ==  'G' ? 'selected' : ''}}>
                                        G | General Audiences
                                    </option>
                                    <option value="PG" {{ $movie->maturity_rating == 'PG'    ? 'selected' : ''}}>
                                        PG | Parental Guidance
                                    </option>
                                    <option value="PG-13" {{ $movie->maturity_rating ==  'PG-13'  ? 'selected' : ''}}>
                                        PG-13 | Parental Strongly
                                    </option>
                                    <option value="R" {{ $movie->maturity_rating == 'R' ? 'selected' : ''}}>
                                        R | Restricted
                                    </option>
                                    <option value="NC-17" {{ $movie->maturity_rating ==  'NC-17'  ? 'selected' : ''}}>
                                        NC-17 | Adults Only
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="running_time">Running Time</label>
                                <input value="{{ $movie->running_time }}" name="running_time" id="running_time"
                                    type="number" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Movie Youtube Trailer URL</label>
                        <input name="trailer_url" type="url" class="form-control"
                            placeholder="Movie Youtube Trailer URL" value="{{ $movie->trailer_url }}">
                    </div>
                    <div class="form-group">
                        <label>Movie vimeo url</label>
                        <input name="vimeo_url" type="url" class="form-control" placeholder="Movie Vimeo URL"
                            value="{{ $movie->vimeo_url }}">
                    </div>
                    <div class="form-group">
                        <label>Movie Description</label>
                        <textarea name="description" rows="4" class="form-control"
                            placeholder="Write a short description for this movie ✌">{{ $movie->description }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 card-form__body card-body d-flex align-items-center">
                            <div class="flex">
                                <label for="premium">Premium movie</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input {{ $movie->is_premium ? 'checked' : '' }} name="is_premium" type="checkbox"
                                        id="premium" class="custom-control-input">
                                    <label class="custom-control-label" for="premium">Yes</label>
                                </div>
                            </div>

                            <div class="flex">
                                <label for="is_new">Mark as New</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input {{ $movie->is_new ? 'checked' : '' }} name="is_new" type="checkbox"
                                        id="is_new" class="custom-control-input">
                                    <label class="custom-control-label" for="is_new">Yes</label>
                                </div>
                            </div>

                            <div class="flex">
                                <label for="publish">Publish movie</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input {{ $movie->is_active ? 'checked' : '' }} name="is_active" type="checkbox"
                                        id="publish" class="custom-control-input">
                                    <label class="custom-control-label" for="publish">Yes</label>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row" id="publish_date_picker">
                        <div class="card-form__body card-body d-flex align-items-center">
                            <div class="form-group">
                                <label for="publish_date">Date</label>
                                <input name="publish_date" id="publish_date" type="text" class="form-control"
                                    placeholder="Flatpickr example" data-toggle="flatpickr"
                                    value="{{ $movie->publish_date }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 card-form__body card-body">
                    <img width="200px" src="{{ asset('thumbnail/'. $movie->cover ) }}" alt="">
                </div>
            </div>

            <div class="m-5">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
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
        @if (!$movie->is_active)
        $('#publish_date_picker').hide();
        @endif
        $('select#maturity-ratings').select2();

        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $('#publish').change(function (e) {
            console.log(this.value);
            $('#publish_date_picker').toggle();
        });
    });
</script>
@endsection
