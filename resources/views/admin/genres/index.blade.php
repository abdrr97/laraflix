@extends('admin.layouts.master')

@section('content')

<div class="container-fluid page__container">

    <div class="card">
        <div class="card-header">
            @include('admin.layouts.includes.header' , ['prev'=>'genres','current'=>'genre list'])
            <a class="btn btn-primary" href="{{ route('admin.genres.create') }}">
                <i class="fa fa-plus"></i>
                Create a Movie Genre
            </a>
        </div>
        <div class="card-body">
            <table id="table" class="table table-responsive-md">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genres as $genre)
                    <tr>
                        <td><small class="text-muted">{{ $genre->id }}</small></td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <span class="badge badge-{{ $genre->status ? 'success' : 'danger'}}">
                                {{ $genre->status ? 'Active' : 'Inactive'}}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.genres.edit',$genre) }}"
                                    class="mr-1 btn btn-sm btn-outline-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.genres.destroy',$genre) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button data-id="{{ $genre->id }}" type="button"
                                        class="genre_delete_confirmation mr-1 btn btn-sm btn-outline-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $genres->links() }}
        </div>
    </div>

</div>
@endsection



@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready( function () {

        $('button.genre_delete_confirmation').each(function (index, element) {
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
                      'genre has been deleted.',
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
