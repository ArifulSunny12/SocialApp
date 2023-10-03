@extends('layouts.app')

@section('content')
<form method="POST" action="" enctype="multipart/form-data">
@csrf
  <div class="form-row">
    <div class="form-group">
        <input type="text" class="form-control" id="status" name="status" placeholder="Type your Status">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <input type="file" class="form-control" id="status_image" name="status_image" placeholder="upload Image">
    </div>
    
    <div class="form-group col-md-2">
    <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
@endsection
