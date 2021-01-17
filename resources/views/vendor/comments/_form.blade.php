@if($errors->has('commentable_type'))
<div class="alert alert-danger" role="alert">
    {{ $errors->first('commentable_type') }}
</div>
@endif

@if($errors->has('commentable_id'))
<div class="alert alert-danger" role="alert">
    {{ $errors->first('commentable_id') }}
</div>
@endif

<form class="form" method="POST" action="{{ route('comments.store') }}">
    @csrf
    @honeypot
    <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
    <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />


    {{-- Guest commenting --}}
    @if(isset($guest_commenting) and $guest_commenting == true)
    <div class="form-group">
        <label for="message">Enter your name here:</label>
        <input type="text" class="form-control
                @if($errors->has('guest_name'))
                    is-invalid
                @endif" name="guest_name" />
        @error('guest_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="message">Enter your email here:</label>
        <input type="email" class="form-control
                @if($errors->has('guest_email'))
                    is-invalid
                @endif" name="guest_email" />
        @error('guest_email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    @endif

    <textarea placeholder="Add comment" class="form__textarea @if($errors->has('message')) is-invalid @endif"
        name="message" rows="3"></textarea>
    <div class="invalid-feedback">
        Your message is required.
    </div>
    <button type="submit" class="form__btn">Post</button>
</form>
