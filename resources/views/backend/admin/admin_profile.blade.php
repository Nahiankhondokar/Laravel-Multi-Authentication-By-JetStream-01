@extends('backend.admin_master');

@section('admin')
<div class="card m-auto shadow pt-3" style="width: 18rem;">
    <img class="card-img-top" src="{{ (!empty($admin -> profile_photo_path)) ? url('media/backend/' . $admin -> profile_photo_path) : url('media/no_image.jpg') }}" style="width: 100px; height : 100px; border-radius : 50%;border: 1px solid gray;margin: auto;display: block; object-fit: cover;">
    <div class="card-body">
      <h5 class="card-title">Admin Name : {{ $admin -> name }}</h5>
      <p class="card-text">Admin Email :  {{ $admin -> email }} </p>
      <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary m-auto d-block">Edit Profile</a>
    </div>
</div>
@endsection
  
