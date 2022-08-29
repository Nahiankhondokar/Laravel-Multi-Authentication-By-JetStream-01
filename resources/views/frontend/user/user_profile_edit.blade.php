@extends('frontend.user_master');

@section('user')
<div class="card m-auto" style="width: 25rem;">

  <form class="p-3" action="{{ route('user.profile.update', $user -> id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h3  class="text-center">User Edit</h3>
    <div class="form-group">
      <label for="exampleInputEmail1">User Name</label>
      <input value="{{ $user -> name }}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User name">
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Email</label>
      <input value="{{ $user -> email }}" name="email" type="text" class="form-control" placeholder="Email">
    </div>

    <label for="exampleInputPassword1">Photo</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Upload</span>
      </div>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputTag" name="image">
        <label class="custom-file-label" for="inputTag">Choose file</label>
      </div>
    </div>
    <img id="imgPriview" class="card-img-top shadow" src="{{ (!empty($user -> profile_photo_path)) ? url('media/frontend/' . $user -> profile_photo_path) : url('media/no_image.jpg') }}" style="width: 100px; height : 100px; border-radius : 50%;border: 1px solid gray;margin: auto;display: block;">
    <br>
    <input type="text" value="{{ $user -> profile_photo_path }}" name="old_image" style="display: none"/>
    <button type="submit" class="btn btn-primary text-center m-auto d-block">Update</button>
  </form>
    
</div>
@endsection
  
