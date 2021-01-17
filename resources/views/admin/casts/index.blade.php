@extends('admin.layouts.master')

@section('content')

<div class="container-fluid page__container">

    <div class="card">
        <div class="card-header">
            @include('admin.layouts.includes.header' , ['prev'=>'casts','current'=>'cast list'])
            <a class="btn btn-primary" href="{{ route('admin.casts.create') }}">
                <i class="fa fa-plus"></i>
                Create a Movie cast
            </a>
        </div>
        <div class="card-body">
            <table id="table" class="table table-responsive-md">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($casts as $cast)
                    <tr>
                        <td><small class="text-muted">{{ $cast->id }}</small></td>
                        <td>{{ $cast->name }}</td>
                        <td>{{ $cast->description }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.casts.edit',$cast) }}"
                                    class="mr-1 btn btn-sm btn-outline-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.casts.destroy',$cast) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button data-id="{{ $cast->id }}" type="button"
                                        class="cast_delete_confirmation mr-1 btn btn-sm btn-outline-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $casts->links() }}
        </div>
    </div>

</div>
@endsection



@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready( function () {

        $('button.cast_delete_confirmation').each(function (index, element) {
            $(element).click(function (e) {
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#6774DF',
                  cancelButtonColor: '#FF4A51',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.value) {
                    Swal.fire(
                      'Deleted!',
                      'cast has been deleted.',
                      'success'
                    ).then(()=>{
                        $(this).parent().submit()
                    })
                  }
                })
            })
        })
    });
</script>
@endsection
