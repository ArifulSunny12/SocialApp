@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header pb-0">
                    <!--profile head start-->
                    <div class="card mb-0 col-md-12 pb-0">
                        <div class="row g-0">
                          <div class="col-md-2">
                            <img src="{{Auth::user()->image }}" class="img-fluid m-3" alt="...">
                          </div>
                          <div class="col-md-10 ps-3">
                            <div class="card-body">
                              <h1 class="card-title">{{Auth::user()->name }}</h1>
                              <h3 class="card-title"><i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->username }}</h3>
                              <p class="card-text mb-1"><i class="fa fa-envelope" aria-hidden="true"></i> {{Auth::user()->email }}</p>
                              <p class="card-text mb-1"><i class="fa fa-briefcase" aria-hidden="true"></i> Web developer</p>
                              <p class="card-text mb-1"><i class="fa fa-map-marker" aria-hidden="true"></i> Dhaka Bangladesh</small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!--profile head end-->
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!--profile container start-->
                    <p class="d-flex justify-content-end gap-2">
                        <a class="btn btn-primary" href="/profile" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Post
                        </a>


                        <a class="btn btn-primary" href="/follower" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Follower
                        </a>


                        <a class="btn btn-primary" href="/following" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Following
                        </a>

                        <a class="btn btn-primary" href="/about" role="button" aria-expanded="false" aria-controls="collapseExample">
                            About
                        </a>

                        <a class="btn btn-primary" href="/about" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Edit Profile
                        </a>
                      </p>



<!-- dynamic post show section start-->
<hr>
@foreach ($allusers as $alluser)
<!--follower show div start-->
<div class="mt-2">
    <form method="POST" action="/removefollower" enctype="multipart/form-data">
        @csrf                                      
        <div class="form-row d-flex justify-content-between ">
             <a  class="form-group d-flex justify-content-start gap-2  col-md-8" href="#" role="button" >
            <div class="form-group d-flex justify-content-start gap-2  col-md-10">
                
                <img src="{{$alluser->image}}"  style="border-radius: 25px; width:50px;">
                <div class="form-group">
                    <h6 class="mb-0"> <p class="card-text mb-0"> {{$alluser->username}}</p></h6>
                    <p class="card-text ">{{ $alluser->name}} </p>
                </div>       
                
            
                
                
                <!-- <input type="hidden" class="form-control" value="{{ $alluser->id }}" id="post_id" name="post_id"> -->
            </div>
            </a>
                                
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary col-12">Remove</button>
                </div>
        </div>
    </form>
</div>
<!--follower show div end-->
<hr>
@endforeach


<!-- dynamic post show section end -->

                      
                      
                    <!--profile container end-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
