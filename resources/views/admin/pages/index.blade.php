@extends('admin.layouts.master')

@section('content')
<div class="container-fluid page__container">

    @include('admin.layouts.includes.header' , ['prev'=>'admin','current'=>'pages'])

    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body"></div>
            <div class="col-lg-8 card-form__body card-body">
                @foreach ($pages as $page)

                <form method="POST" action="{{ route("admin.pages.page", ['page'=>$page]) }}" class="mt-5">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Page title</label>
                        <input value="{{ $page->title }}" id="title" name="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="{{ $page->type }}">Terms of Use</label>
                        <div id="{{ $page->type }}">{!! $page->body !!}</div>
                    </div>

                    <input type="hidden" name="{{ $page->type }}" value="{{ $page->body }}">
                    <input type="hidden" name="type" value="{{ $page->type }}">
                    <button id="btn_{{ $page->type }}" class="mt-3 btn btn-primary">Submit</button>
                </form>

                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection


@section('styles')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endsection

@section('scripts')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<script>
    $(document).ready(function () {
        var toolbarOptions = [
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic'],
            ['link', 'blockquote', 'code-block' ],
            [{ 'indent': '-1'}, { 'indent': '+1' }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }],
            [{ 'font': [] }],
            ['clean']
        ];

        var options = {
            placeholder: 'About your page',
            readOnly: false,
            theme: 'snow',
            modules: {
              toolbar: toolbarOptions
            }
        };
        let terms =  new Quill('#terms',options);
        let policy =  new Quill('#policy',options);
        let security =  new Quill('#security',options);

        $('#btn_terms').click(()=>{
            var body = $('input[name=terms]');
            body.val(terms.root.innerHTML);
            $(this).parent().submit();
        })
        $('#btn_policy').click(()=>{
            var body = $('input[name=policy]');
            body.val(policy.root.innerHTML);
            $(this).parent().submit();
        })
        $('#btn_security').click(()=>{
            var body = $('input[name=security]');
            body.val(security.root.innerHTML);
            $(this).parent().submit();
        })
    });

</script>
@endsection
