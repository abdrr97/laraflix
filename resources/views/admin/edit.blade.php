@extends('admin.layouts.master')

@section('content')

<div class="container-fluid page__container mt-5">

    <form action="{{ route('admin.user.update', auth()->user()) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <div class="form-group">
                        <label for="profile_image">Profile Image</label>
                        <img id="profile_img" class="w-75 h-75 m-2 rounded-sm"
                            src="{{ asset('storage/users/'.auth()->user()->id.'/images/'.auth()->user()->profile_image) }}"
                            alt="{{ auth()->user()->profile_image }}">

                        <div class="custom-file">
                            <input accept="images/*" id="profile_image" name="profile_image" type="file"
                                class="custom-file-input">
                            <label class="custom-file-label" for="profile_image">Choose file</label>
                        </div>

                    </div>
                </div>

                <div class="col-lg-8 card-form__body card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fname">First name</label>
                                <input id="fname" type="text" class="form-control" placeholder="First name"
                                    value="{{ auth()->user()->firstname }}" name="firstname">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lname">Last name</label>
                                <input id="lname" type="text" class="form-control" placeholder="Last name"
                                    value="{{ auth()->user()->lastname }}" name="lastname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" placeholder="email@example.com"
                            value="{{ auth()->user()->email }}" autocomplete="emai" name="email">
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio / Description</label>
                        <textarea id="bio" rows="4" class="form-control" placeholder="Bio / description ..."
                            name="bio">{{ auth()->user()->bio }}</textarea>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <p><strong class="headings-color">Update Your Password</strong></p>
                    <p class="text-muted">Change your password.</p>
                </div>
                <div class="col-lg-8 card-form__body card-body">
                    <div class="form-group">
                        <label for="opass">Old Password</label>
                        <input style="width: 270px;" id="opass" type="password" class="form-control"
                            placeholder="Old password" value="" autocomplete="current-password">
                    </div>
                    <div class="form-group">
                        <label for="npass">New Password</label>
                        <input placeholder="password" style="width: 270px;" id="npass" type="password"
                            class="form-control " autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <label for="cpass">Confirm Password</label>
                        <input style="width: 270px;" id="cpass" type="password" class="form-control"
                            placeholder="Confirm password" autocomplete="new-password">
                    </div>
                </div>
            </div>
        </div> --}}

    </form>

</div>

@endsection

@section('scripts')

<script>
    // Add the following code if you want the name of the file appear on select
        $("input.custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
</script>

@endsection