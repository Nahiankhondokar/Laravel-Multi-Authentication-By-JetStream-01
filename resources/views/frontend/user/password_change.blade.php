@extends('frontend.user_master');

@section('user')
<div class="card m-auto" style="width: 25rem;">

  <form class="p-3" action="{{ route('user.password.update') }}" method="POST">
    @csrf
    <h3  class="text-center">User Password Update</h3>
    <hr>

    <div class="form-group">
      {{-- <label for="exampleInputEmail1">Current Password</label> --}}
      <input name="old_pass" type="password" class="form-control" placeholder="Old Password" required>
      <span></span>
    </div>

    <div class="form-group">
        {{-- <label for="exampleInputEmail1">New Password</label> --}}
        <input name="new_pass" type="password" class="form-control" placeholder="New Password" required>
    </div>

    <div class="form-group">
        {{-- <label for="exampleInputEmail1">Confirm Password</label> --}}
        <input  name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required>
    </div>
 
 
    <button type="submit" class="btn btn-primary text-center m-auto d-block">Update</button>
  </form>
    
</div>
@endsection
  
