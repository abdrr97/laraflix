@extends('admin.layouts.master')

@section('content')
<div class="container-fluid page__container">
  <div class="card card-form">
    <div class="card-header">
      @include('admin.layouts.includes.header' , ['prev'=>'Users','current'=>$title])
      <a class="btn btn-primary m-3" href="{{ route('admin.index') }}">
        <i class="fa fa-arrow-left"></i> BACK
      </a>
    </div>
    <div class="row no-gutters">
      <div class="col-lg-4 card-body"></div>
      <div class="col-lg-8 card-form__body card-body">
        <p class="text-uppercase"> Are you sure you want to delete <strong>{{ $user->username }}</strong></p>

        <form id="user_delete_form" method="POST" action="{{ route('admin.users.destroy', $user) }}">
          @method('DELETE')
          @csrf
          {{-- <button id="user_delete_button" type="submit" class="hidden " style="display: none"></button> --}}
        </form>
        <button id="user_delete_confirmation" type="button" class="btn btn-danger">Yes I'm sure. Delete</button>

      </div>
    </div>
  </div>

</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
  $('#user_delete_confirmation').click(function () {

        Swal.fire({
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#6774DF',
        cancelButtonColor: '#FF4A51',
        confirmButtonText: 'Yes, delete it!',
        input: 'text',
        inputPlaceholder: 'Enter your DELETE to confirme'

        }).then((result) => {
          if (result.value == 'DELETE') {
            Swal.fire(
              'Deleted!',
              'User has been deleted !',
              'success'
            );
            $('form#user_delete_form').submit();
          }else{
           Swal.fire(
            'Cancelled!',
            `Delete is not confirmed`,
            'danger'
            )
         }
        });
     });

  $(document).ready( function () {
    $('#table').DataTable();
  });
</script>
@endsection