@extends('admin.layouts.master')


@section('content')

<div class="container-fluid page__container">
    <div class="card card-form">
        <div class="card-header">
            @include('admin.layouts.includes.header' , ['prev'=>'series', 'current'=>'create a new serie'])
        </div>

        <form action="{{ route('admin.series.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row no-gutters">
                <div class="col-lg-8 card-form__body card-body">
                    <div class="form-group">
                        <label>Serie Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Serie Name" value="">
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input id="year" name="year" type="number" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="genres">Serie Genres</label>
                                <select multiple="multiple" name="genres[]" id="genres" data-toggle="select"
                                    class="js-example-basic-multiple js-states form-control">
                                    @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
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
                                    <option value="{{ $cast->id }}">{{ $cast->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="quality">Quality</label>
                                <select data-toggle="select" name="quality" id="quality" class="form-control">
                                    <option value="HD">HD</option>
                                    <option value="FULL HD">FULL HD</option>
                                    <option value="4K">4K</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Rate</label>
                                <select data-toggle="select" class="form-control" name="rate" id="rate">
                                    @foreach (range(1,10) as $n)
                                    <option value="{{ $n }}">{{ $n }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cover">Serie Cover</label>
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
                                    <option>G</option>
                                    <option>PG</option>
                                    <option>PG-13</option>
                                    <option>R</option>
                                    <option>NC-17</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="running_time">Running Time</label>
                                <input name="running_time" id="running_time" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Serie Youtube Trailer URL</label>
                        <input name="trailer_url" type="url" class="form-control"
                            placeholder="Serie Youtube Trailer URL like https://www.youtube.com/watch?v=vcgVAw5yriY"
                            value="">
                    </div>
                    <div class="form-group">
                        <label>Serie Description</label>
                        <textarea name="description" rows="4" class="form-control"
                            placeholder="Write a short description for this serie ✌"></textarea>
                    </div>

                    <div id="searie_seasons" class="mt-3"></div>

                    <button type="button" id="add_searie_seasons" class="mt-3 btn btn-success">
                        <i class="fa fa-plus"></i> Add a Season
                    </button>
                    <button onclick="location.reload()" type="button" class="mt-3 btn btn-secondary">
                        <i class="fa fa-redo"></i>
                    </button>
                    <div class="row">
                        <div class="col-lg-8 card-form__body card-body d-flex align-items-center">
                            <div class="flex">
                                <label for="premium">Premium Serie</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input name="is_premium" type="checkbox" id="premium" class="custom-control-input">
                                    <label class="custom-control-label" for="premium">Yes</label>
                                </div>
                            </div>

                            <div class="flex">
                                <label for="is_new">Mark as New</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input name="is_new" type="checkbox" id="is_new" class="custom-control-input">
                                    <label class="custom-control-label" for="is_new">Yes</label>
                                </div>
                            </div>

                            <div class="flex">
                                <label for="publish">Publish Serie</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input name="is_active" type="checkbox" id="publish" class="custom-control-input">
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
                                    placeholder="Publish Date" data-toggle="flatpickr" value="today">
                            </div>
                        </div>
                    </div>
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
    $(document).ready(function () {
        //#region
        $("#publish_date_picker").hide();
        $("select#maturity-ratings").select2();
        $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $("#publish").change(function (e) {
            $("#publish_date_picker").toggle();
        });
        //#endregion
        let seasons_c = 0;
        let episodes_c = 0;
        let season_deleted = 0, season_max = 0,  episode_deleted = 0, episode_max = 0;
        $("#add_searie_seasons").on('click',function () {
            if (season_deleted == 0) {
                if (season_max != seasons_c) {
                    seasons_c = season_max
                }
                seasons_c++
                season_max = seasons_c
            }else{
                seasons_c = season_deleted
                season_deleted = 0
            }
            let html = `
            <div class="card m-3 p-2 mt-3" style="border: dashed 2px #F3A542">
                <div class="card-header d-flex justify-content-between align-items-center m-1">
                <h5> Season ${seasons_c} </h5>
                <button data-remove_searie_season type="button"
                    data-season="${seasons_c}"
                    class="btn btn-sm btn-danger float-right">
                    <i class="fa fa-times"></i>
                </button>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="searie_seasons_season_${seasons_c}_title">Season title</label>
                            <input class="form-control" type="text" placeholder="Season title"
                                name="searie[seasons][season_${seasons_c}][title]"
                                id="searie_seasons_season_${seasons_c}_title">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="searie_seasons_season_${seasons_c}_publish_date">Season Publish Date</label>
                            <input name="searie[seasons][season_${seasons_c}][publish_date]"
                                id="searie_seasons_season_${seasons_c}_publish_date" type="date" class="form-control"
                                placeholder="Publish Date" data-toggle="flatpickr" value="{{ now() }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="searie_seasons_season_${seasons_c}_info">Season Info</label>
                    <textarea class="form-control" placeholder="Season info"
                        name="searie[seasons][season_${seasons_c}][info]" id="searie_seasons_season_${seasons_c}_info"
                        cols="30" rows="1"></textarea>
                </div>
                <div id="searie_season_${seasons_c}_episodes" class="mt-3"></div>
                <button type="button" data-add_searie_season_episodes data-season="${seasons_c}" data-episodes=""
                    class="mt-2 btn btn-sm btn-warning">
                    <i class="fa fa-plus"></i> Add an Episode
                </button>
                </div>
            </div>`
            $("#searie_seasons").append(html)
        });
        $("#searie_seasons").off().on("click","[data-add_searie_season_episodes]", function () {
            $(this).attr('data-episodes') == '' ? episodes_c = 0 : episodes_c = $(this).attr('data-episodes');
            if ($(this).attr('data-episodes') == '' ) {
                episode_max = 0
            }
            if (episode_deleted == 0) {
                if (episode_max != episodes_c) {
                    episodes_c = episode_max
                }
                episodes_c++
                episode_max = episodes_c
            }else{
                episodes_c = episode_deleted
                episode_deleted = 0
            }
            $(this).attr('data-episodes',episodes_c)
            let season_num = $(this).attr("data-season")
            let html =`
            <div class="card p-2 mt-3" style="border: dashed 1.5px #65BC4C">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center m-1">
                        <h5>Episode ${episodes_c}</h5>
                        <button type="button" data-remove_searie_season_episode data-season="${seasons_c}"
                            class="btn btn-sm btn-danger float-right">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="searie_seasons_season_${season_num}_episodes_episode_${episodes_c}_title">
                                    Episode title
                                </label>
                                <input class="form-control" type="text" placeholder="Episode title"
                                    name="searie[seasons][season_${season_num}][episodes][episode_${episodes_c}][title]"
                                    id="searie_seasons_season_${season_num}_episodes_episode_${episodes_c}_title">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label
                                    for="searie_seasons_season_${season_num}_episodes_episode_${episodes_c}_publish_date">
                                    Episode Publish Date
                                </label>
                                <input
                                    name="searie[seasons][season_${season_num}][episodes][episode_${episodes_c}][publish_date]"
                                    id="searie_seasons_season_${season_num}_episodes_episode_${episodes_c}_publish_date"
                                    type="date" class="form-control" placeholder="Publish Date" data-toggle="flatpickr"
                                    value="today">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="searie_seasons_season_${season_num}_episodes_episode_${episodes_c}_vimeo_url">
                            Episode Vimeo Url
                        </label>
                        <input class="form-control" type="text" placeholder="Episode Vimeo Url"
                            name="searie[seasons][season_${season_num}][episodes][episode_${episodes_c}][vimeo_url]"
                            id="searie_seasons_season_${season_num}_episodes_episode_${episodes_c}_vimeo_url">
                    </div>
                </div>
            </div>`;
            $(`#searie_season_${season_num}_episodes`).append(html)
        });
        $("#searie_seasons").bind().on("click","[data-remove_searie_season]", function () {
            season_deleted =  $(this).attr("data-season")
            seasons_c --;
            $(this).parent().parent().remove()
        });

        $("#searie_seasons").bind().on("click","[data-remove_searie_season_episode]", function () {
            episode_deleted =  $(this).attr("data-season")
            episodes_c --;
            $(this).parent().parent().parent().remove()
        });
    });
</script>
@endsection
