@extends('frontend.user_master');

@section('user')
<div class="card m-auto shadow pt-3" style="width: 18rem;">
    <img class="card-img-top" src="{{ (!empty($user -> profile_photo_path)) ? url('media/frontend/' . $user -> profile_photo_path) : url('media/no_image.jpg') }}" style="width: 100px; height : 100px; border-radius : 50%;border: 1px solid gray;margin: auto;display: block;">
    <div class="card-body">
      <h5 class="card-title">User Name : {{ $user -> name }}</h5>
      <p class="card-text">User Email :  {{ $user -> email }} </p>
      <a href="{{ route('user.profile.edit', $user -> id) }}" class="btn btn-primary m-auto d-block">Edit Profile</a>
    </div>
</div>
@endsection
  
