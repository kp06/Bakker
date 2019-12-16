@section('title','Edit profile')
@extends('Admin.layouts.header')
@section('content-section')


<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Edit Profile Details</h3>
      </div>


    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Profie <small>Edit Profile</small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            @if(Session::has('success-message'))
<div class="alert alert-danger">
{{Session::get('success-message')}}

</div>
@endif
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{Route('editprofile',$user->userDetail->id)}}">
              {{csrf_field()}}
              <input type="hidden" value="{{Auth::user()->id}}" name="userid" />
              <div class="row">
              <div class="col-lg-2 col-md-2">
                        <div class="profile-img" style="position: relative; ">
                            <div style="position: absolute; top:70%;left:33%;color:white;font-size:15px;">Change photo</div>
                            
                            
                           
                      

                            <img src="{{asset('admin/images/'.$user->userDetail->image)}}" alt="" style="width: 282px; height:230px;"/>
                            
                          
                            
                            <div class="file btn btn-sm btn-primary">
                                <input type="file" name="image"/>
                            </div>
                            
                        </div>
                    </div>
                    
                  <div class="col-lg-10 col-md-9">
                  <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="first-name" required="required" class="form-control " value="{{$user->userDetail->first_name}}" name="fname">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="last-name" name="lname" required="required" value="{{$user->userDetail->last_name}}" class="form-control">
                </div>
              </div>
               <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" >Gender <span class="required">*</span>
                </label>
                <div class="checkbox mr-2 ml-2">
                  <label>
                    <input type="radio" class="flat " value="male" checked="checked" name="gender"> Male
                  </label>
                </div>
                <div class="checkbox ">
                  <label>
                    <input type="radio" class="flat" value="female" name="gender"> Female
                  </label>
                </div>
              </div>
              

             
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="first-name" required="required" class="form-control " value="{{$user->userDetail->address}}" name="address">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Phone <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="number" id="first-name" required="required" value="{{$user->userDetail->phone}}" class="form-control " name="phone">
                </div>
              </div>
              <div class="item form-group ">
                <label class="col-form-label col-md-3 col-sm-3 label-align" >Is Staff <span class="required">*</span>
                </label>
                <div class="checkbox mr-2 ml-2">
                  <label>
                    <input type="radio" class="flat " value="yes" checked="checked" name="staff"> Yes
                  </label>
                </div>
                <div class="checkbox ">
                  <label>
                    <input type="radio" class="flat" value="no" name="staff"> No
                  </label>
                </div>
              </div>
                  </div>
              </div>
              
              





              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3 " style="margin-left:40%;">
                  <button type="submit" class="btn btn-success">Update Profile</button>
                  <button class="btn btn-primary" type="button">Cancel</button>
                  <button class="btn btn-primary" type="reset">Reset</button>
                  
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
