@extends('backend.admin_master');

@section('admin')
<div class="card m-auto m-3" style="width: 25rem;">

  <form class="p-3" action="{{ route('admin.profile.update', $admin -> id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h3  class="text-center">Admin Profile Edit</h3>
    <div class="form-group">
      <label for="exampleInputEmail1">Admin Name</label>
      <input value="{{ $admin -> name }}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User name">
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Admin Email</label>
      <input value="{{ $admin -> email }}" name="email" type="text" class="form-control" placeholder="Email">
    </div>

    <label for="exampleInputPassword1">Admin Photo</label>
    <div class="form-group">
      <input type="file" class="file-control" id="inputTag" name="image">
    </div>

    <img id="imgPriview" class="card-img-top shadow" src="{{ (!empty($admin -> profile_photo_path)) ? url('media/frontend/' . $admin -> profile_photo_path) : url('media/no_image.jpg') }}" style="width: 100px; height : 100px; border-radius : 50%;border: 1px solid gray;margin: auto;display: block;">
    <br>
    <input type="text" value="{{ $admin -> profile_photo_path }}" name="old_image" style="display: none"/>
    <button type="submit" class="btn btn-primary text-center m-auto d-block">Update</button>
  </form>
    
</div>
@endsection
  
