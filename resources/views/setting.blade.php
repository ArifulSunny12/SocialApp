@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">

                <!--profile head start-->
                <div class="card-header pb-0">
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
                </div>
                <!--profile head end-->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    <!--setting option div start-->
                    <p class="d-flex justify-content-start gap-2">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapsPassword" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Reset Password
                    </a>

                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapsDelete" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Delete Account
                    </a>

                      <!--password rest div start-->
                      <div class="collapse mb-3" id="collapsPassword">
                        <div class="card card-body">

                       
                        <form method="POST" action="/passwordreset" enctype="multipart/form-data">
                        @csrf
                        
                        <h3> Reset Password form </h3>

                        <div class="form-row m-3 ">
                            <div class="form-group">
                                <input type="text" class="form-control" id="oldPassword" name="oldPassword" placeholder="Old Password" required>
                            </div>
                        </div>

                        <div class="form-row m-3 ">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                            </div>
                        </div>

                        <div class="form-row m-3 ">
                            <div class="form-group">
                                <input type="text" class="form-control" id="newPassword" name="newPassword" placeholder="New Password" required>
                            </div>
                        </div>
                        <div class="form-row m-3 ">
                            <div class="form-group">
                                <input type="text" class="form-control" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm New Password" required>
                            </div>
                        </div>
                        <div class="form-row m-3 ">
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </div>
                            
                            
                       
                        </form>

                        </div>
                      </div>
                        <!--password rest div end-->


                        <!--Delete Account div start-->
                      <div class="collapse mb-3" id="collapsDelete">
                        <div class="card card-body">

                       
                        <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        
                        <h3> Delete Account form </h3>

                       
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Password" name="Password" placeholder="Password">
                            <label for="floatingInput">Password</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="comment" name="comment" placeholder="Reason to Delete Acoount?">
                            <label for="floatingInput">Reason to Delete Acoount?</label>
                        </div>
    
                        <div class="form-row m-3 ">
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary">Delete Account</button>
                            </div>
                        </div>
                            
                            
                       
                        </form>

                        </div>
                      </div>
                        <!--Delete Account div end-->



                    <!--setting option div start-->



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
