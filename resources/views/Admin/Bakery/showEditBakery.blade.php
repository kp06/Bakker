@extends('Admin.layouts.header')
@section('title','Edit-Bakery')
@section('content-section')




<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Bakery</h3>
            </div>


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Home <small>Edit Bakery</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @if(Session::has('success-message'))
                        <div class="alert alert-danger">
                            {{Session::get('success-message')}}

                        </div>
                        @endif
                        @foreach($bakery as $newbakery)
                        <form id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{Route('updateBakery',[$newbakery->id])}}">
                            @endforeach
                            {{csrf_field()}}
                           <div class="row item form-group">
                              <div class="col-md-6 col-sm-6 " style="margin-left: 300px;">
                                <div class="profile-img" >
                                    <div style="position: absolute; top:75%;left:5%;color:white;font-size:15px;">Change photo</div>


                                    @foreach($bakery as $newbakery)


                                    <img src="{{asset('admin/images/Bakery/'.$newbakery->image)}}" alt="" style="width: 282px; height:230px;"/>
                                    @endforeach



                                    <div class="file btn btn-sm btn-primary">
                                        <input type="file" name="image"/>
                                    </div>
                                </div>

                                </div>
                            </div>
                           
                      

                               
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"  for="first-name">Bakery Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                @foreach($bakery as $newbakery) 
                                    <input type="text" id="first-name" required="required" value="{{$newbakery->name}}" class="form-control " name="bname">
                                    @endforeach
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">slug <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                @foreach($bakery as $newbakery) 
                                    <input type="text" id="last-name"  value="{{$newbakery->name}}" name="slug" required="required" class="form-control">
                                    @endforeach
                                </div>
                            </div>
                            <div class="item form-group ">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">is_active <span class="required">*</span>
                                </label>
                                <div class="checkbox mr-2 ml-2">
                                    <label>
                                        <input type="radio" class="flat " value="1" checked="checked" name="isactive"> yes
                                    </label>
                                </div>
                                <div class="checkbox ">
                                    <label>
                                        <input type="radio" class="flat" value="0" name="isactive"> no
                                    </label>
                                </div>
                            </div>
                           


                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Description<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                @foreach($bakery as $newbakery) 
                                    <input type="text" id="first-name"  value="{{$newbakery->description}}" required="required" class="form-control" name="description">
                                    @endforeach
                                </div>
                                
                            </div> 
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Location<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                @foreach($bakery as $newbakery) 
                                    <input type="text" value="{{$newbakery->location}}" id="first-name" required="required" class="form-control" name="location">
                                    @endforeach
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Number<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                @foreach($bakery as $newbakery) 
                                    <input type="number" id="first-name" value="{{$newbakery->number}}" required="required" class="form-control " name="number">
                                </div>
                                @endforeach
                            </div>
                            





                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Update Bakery</button>
                        <button class="btn btn-primary" type="button">Cancel</button>


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