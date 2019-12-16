@section('title','View profile')
@extends('Admin.layouts.header')
@section('content-section')



<link rel="stylesheet" type="text/css" href="{{asset('admin/css/profile.css')}}">


<!------ Include the above in your HEAD tag ---------->

 <div class="right_col" role="main">
            
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-img">
                         @foreach($admin as $newadmin)
                         <img style="width:70%; height:168.77px;"src="{{path()}}"/>
                         @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    @foreach($admin as $newadmin)
                                        {{$newadmin->first_name}} &nbsp {{$newadmin->last_name}}
                                        @endforeach
                                    </h5>
                                    <h6>
                                        Admin and Developer
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab"  href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a  href="{{Route('showeditprofile',[Auth::user()->id])}}"><button class="profile-edit-btn btn-light"> Edit Profile</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-work">
                            <p>Bakker</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{Auth::user()->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                @foreach($admin as $newadmin)
                                                <p>{{$newadmin->first_name}}&nbsp{{$newadmin->last_name}}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                @foreach($admin as $newadmin)
                                                <p>{{$newadmin->gender}}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                               
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                            @foreach($admin as $newadmin)
                                                <p>{{$newadmin->phone}}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>address</label>
                                            </div>
                                            <div class="col-md-6">
                                                @foreach($admin as $newadmin)
                                                <p>{{$newadmin->address}}</p>
                                                @endforeach
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                       
        </div>

@endsection