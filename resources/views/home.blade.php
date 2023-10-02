@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <!--alert div start-->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <!--alert div end-->

                <!--profile container start-->

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
@foreach ($posts as $allpost)
   <!-- <tr>
    <td>{{ $allpost->id }}</td>
    <td>{{ $allpost->user_id }}</td>
    <td>{{ $allpost->content }}</td>
    <td>{{ $allpost->image_path }}</td>
    <td>{{ $allpost->created_at }}</td>
    <td>{{ $allpost->updated_at }}</td>
    <td>{{ $allpost->user->name }}</td>
    <td>{{ $allpost->user->username }}</td>
    <td>{{ $allpost->user->image }}</td>
    <td>{{ $allpost->user->id  }}</td>
    </tr> -->
    
    <!--public post div start-->
    <div class="row mb-3 ms-4">
    <!--left side start-->
        <div class="col-8">
        <!--Public post start-->
        <div class="card card-body p-0">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-start gap-2 ">
                        <img src="{{ $allpost->user->image }}"  style="border-radius: 25px; width:50px;">
                        <div class="form-group">
                        <h5 class="mb-0"> <p class="card-text mb-0"> {{ $allpost->user->username }}</p></h5>
                        <p class="card-text "><small class="text-body-secondary">{{ $allpost->updated_at }}</small></p>
                        </div>
                    </div>    
                </div>
                            
                <div class="card-body">

                    <div class="">
                        <p class="card-text ">
                        {{ $allpost->content }}
                        </p>
                        <img src="{{ $allpost->image_path }}"  style="width:100%;">
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

                    @foreach ($allpost->comment as $comment)
                   <!-- <td>{{ $comment->user_id}} </td>
                    <td>{{ $comment->post_id}} </td>
                    <td>{{ $comment->content}} </td> -->
   
                    <?php $user_image= App\Models\User::select('username','image')->where('id',$comment->user_id)->get(); ?>
                    <!--show comment section start-->
                    <div class="d-flex justify-content-start gap-2 mt-2">
                        <img src="{{$user_image[0]->image}}"  style="border-radius: 25px; width:50px;">
                        <div class="form-group">
                        <h6 class="mb-0"> <p class="card-text mb-0"> {{$user_image[0]->username}}</p></h6>
                        <p class="card-text ">{{ $comment->content}} </p>
                        </div>
                    </div>
                     <!--show comment section end-->
                     @endforeach
                    <div class="mt-2">
                        <form method="POST" action="/postcomment" enctype="multipart/form-data">
                            @csrf                                      
                              <div class="form-row d-flex justify-content-between ">
                                <div class="form-group col-md-10">
                                <input type="text" class="form-control" id="comment" name="comment" placeholder="Type your comment">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}" id="user_id" name="user_id">
                                <input type="hidden" class="form-control" value="{{ $allpost->id }}" id="post_id" name="post_id">
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
    <!--public post div end-->
    @endforeach
</div>
<hr>
    <!--public post div start-->
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
    <!--public post div end-->
                      
                      
                    <!--profile container end-->





            </div>
        </div>
    </div>
</div>
@endsection
