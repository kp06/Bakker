@section('title','update profile')
@extends('Admin.layouts.header')
@section('content-section')


<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add Profile Details</h3>
      </div>


    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Profie <small>Update Profile</small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            @if(Session::has('success-message'))
<div class="alert alert-danger">
{{Session::get('success-message')}}

</div>
@endif
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{Route('updateprofile')}}">
              {{csrf_field()}}
              <input type="hidden" value="{{Auth::user()->id}}" name="userid" />

              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="first-name" required="required" class="form-control " name="fname">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="last-name" name="lname" required="required" class="form-control">
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
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Upload Image</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="middle-name" class="form-input" type="file" name="image">
                </div>
              </div>

             
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="first-name" required="required" class="form-control " name="address">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Phone <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="number" id="first-name" required="required" class="form-control " name="phone">
                </div>
              </div>





              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <button type="submit" class="btn btn-success">Add Details</button>
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
