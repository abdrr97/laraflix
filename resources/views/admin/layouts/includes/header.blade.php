<div class="page__heading d-flex align-items-center">
    <div class="flex">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">
                        <i class="material-icons icon-20pt">home</i>
                    </a>
                </li>

                @isset($prev)
                <li class="breadcrumb-item"> {{ $prev }} </li>
                @endisset

                @isset($current)
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $current }}
                </li>
                @endisset
            </ol>
        </nav>

        @isset($current)
        <h1 class="m-0 text-uppercase">
            {{ $current }}
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Back</a>
        </h1>
        @endisset
    </div>

</div>