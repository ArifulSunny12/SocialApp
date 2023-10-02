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
                        <a class="btn btn-primary" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Post
                        </a>


                        <a class="btn btn-primary" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Follower
                        </a>


                        <a class="btn btn-primary" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Following
                        </a>

                        <a class="btn btn-primary" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
                            About
                        </a>

                        <a class="btn btn-primary" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Edit Profile
                        </a>
                      </p>

                      <!--new status post start-->
                      <div class="card card-body p-0">
                        <div class="card">
                            <h5 class="card-header">Post something</h5>
                            <div class="card-body">
                                <form method="POST" action="/poststatus" enctype="multipart/form-data">
                                    @csrf
                                      <div class="form-row">
                                        <div class="form-group">
                                            <textarea class="form-control" style="min-height: 100px;" id="status" name="status" placeholder="Type your Status"></textarea>
                                            <input type="hidden" class="form-control" value="{{Auth::user()->id }}" id="user_id" name="user_id">
                                        </div>
                                      </div>
                                      <div class="form-row d-flex justify-content-between gap-2"">
                                        <div class="form-group col-md-6">
                                        <input type="file" class="form-control" id="status_image" name="status_image" placeholder="upload Image">
                                        </div>
                                        
                                        <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-primary col-12">Post</button>
                                        </div>
                                      </div>
                                    </form>
                            </div>
                          </div>
                    </div>
                      <!--new status post end-->

<hr>
    <div class="row">
    <!--left side start-->
        <div class="col-8">
        <!--Public post start-->

        <div class="card card-body p-0">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-start gap-2 ">
                        <img src="{{   Auth::user()->image }}"  style="border-radius: 25px; width:50px;">
                        <div class="form-group">
                        <h5 class="mb-0"> <p class="card-text mb-0"> {{Auth::user()->username }}</p></h5>
                        <p class="card-text "><small class="text-body-secondary">02 october 2023 01:10PM</small></p>
                        </div>
                    </div>    
                </div>
                            
                <div class="card-body">

                    <div class="">
                        <p class="card-text ">
                            Best friends are the people in your life that make you laugh louder, smile brighter, and live better 😍
                            and much more 😂😂
                        </p>
                        <img src="{{asset('postimage/friends.jpg')}}"  style="width:100%;">
                    </div>
                    <!--like comment share count start-->
                    <div class="d-flex d-flex justify-content-between mt-2">
                        
                            
                        <a href="#" role="button" aria-expanded="false" >
                            <small class="text-body-secondary"><i class="fa fa-thumbs-up" aria-hidden="true">  25 Likes</i></small>
                            
                        </a>
                            <small class="text-body-secondary"><i class="fa fa-commenting" aria-hidden="true">  1 Comment</i></small>
                            <small class="text-body-secondary"><i class="fa fa-share" aria-hidden="true">  2 Share</i></small>
                        
                    </div>
                    <!--like comment share count end-->

                    <!--like share section start-->
                    <hr class="m-1">
                    <div class="d-flex d-flex  justify-content-around mt-2">
                        <a href="#" role="button" aria-expanded="false">
                            <i class="fa fa-thumbs-up" aria-hidden="true"> Like</i>
                        </a>
                        <a href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-commenting" aria-hidden="true"> Comment</i>
                        </a>

                        <a href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-share" aria-hidden="true"> Share</i>
                        </a>
                    </div>
                    <hr class="m-1">
                    <!--like share section end-->


                    <!--show comment section start-->
                    <div class="d-flex justify-content-start gap-2 mt-2">
                        <img src="{{   Auth::user()->image }}"  style="border-radius: 25px; width:50px;">
                        <div class="form-group">
                        <h6 class="mb-0"> <p class="card-text mb-0"> {{Auth::user()->username }}</p></h6>
                        <p class="card-text ">well said bro </p>
                        </div>
                    </div>
                     <!--show comment section end-->

                    <div class="mt-2">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf                                      
                              <div class="form-row d-flex justify-content-between ">
                                <div class="form-group col-md-10">
                                <input type="text" class="form-control" id="comment" name="comment" placeholder="Type your comment">
                                </div>
                                
                                <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-primary col-12">Post</button>
                                </div>
                              </div>
                            </form>
                    </div>
                                
                </div>
            </div>
        </div>
        <!--Public post end-->
    </div>
    <!--left side end-->

                        <!--right side start-->
                        <div class="col-4"></div>
                        <!--right side end-->
                    </div>
                      
                      
                    <!--profile container end-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
