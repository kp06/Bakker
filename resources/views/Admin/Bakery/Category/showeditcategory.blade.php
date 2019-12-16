@extends('Admin.layouts.header')
@section('title','Edit-Category')
@section('content-section')




<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Category</h3>
            </div>


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Home <small>Edit Category</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @if(Session::has('success-message'))
                        <div class="alert alert-danger">
                            {{Session::get('success-message')}}

                        </div>
                        @endif
                        @foreach($category as $newcategory)
                        <form id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{Route('updatecategory',[$newcategory->id])}}">
                            @endforeach
                            {{csrf_field()}}
                           <div class="row item form-group">
                              <div class="col-md-6 col-sm-6 " style="margin-left: 300px;">
                                <div class="profile-img" >
                                    <div style="position: absolute; top:75%;left:5%;color:white;font-size:15px;">Change photo</div>


                                    @foreach($category as $newcategory)


                                    <img src="{{asset('admin/images/Category/'.$newcategory->image)}}" alt="" style="width: 282px; height:230px;"/>
                                    @endforeach



                                    <div class="file btn btn-sm btn-primary">
                                        <input type="file" name="image"/>
                                    </div>
                                </div>

                                </div>
                            </div>
                           
                      

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Category Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                       @foreach($category as $newcategory)
                                       <input type="text" id="first-name" required="required" value="{{$newcategory->name}}" class="form-control " name="cname">
                                       @endforeach
                                   </div>
                               </div>
                               <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">slug <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                  @foreach($category as $newcategory)
                                  <input type="text" id="last-name" name="slug" value="{{$newcategory->slug}}" required="required" class="form-control">
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
                                @foreach($category as $newcategory)
                                <input type="text" id="first-name" required="required" value="{{$newcategory->description}}" class="form-control " name="description">
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>










                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Update Category</button>
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