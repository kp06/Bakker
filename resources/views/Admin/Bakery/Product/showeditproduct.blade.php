@extends('Admin.layouts.header')
@section('title','Edit-Product')
@section('content-section')




<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Product</h3>
            </div>


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Home <small>Edit Product</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @if(Session::has('success-message'))
                        <div class="alert alert-danger">
                            {{Session::get('success-message')}}

                        </div>
                        @endif
                        @foreach($product as $newproduct)
                        <form id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{Route('updateproduct',[$newproduct->id])}}">
                            @endforeach
                            {{csrf_field()}}
                            <div class="row item form-group">
                              <div class="col-md-6 col-sm-6 " style="margin-left: 300px;">
                                <div class="profile-img" >
                                    <div style="position: absolute; top:70%;left:33%;color:white;font-size:15px;">Change photo</div>


                                    @foreach($product as $newproduct)


                                    <img src="{{asset('admin/images/product/'.$newproduct->image)}}" alt="" style="width: 282px; height:230px;"/>
                                    @endforeach



                                    <div class="file btn btn-sm btn-primary">
                                        <input type="file" name="image"/>
                                    </div>

                                </div>
                            </div>
                      </div>





                        <div class="item form-group ">

                            <label class="col-form-label col-md-3 col-sm-3 label-align  ">Select Category<span class="required">*</span></label>

                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control" name="cid">
                                    @foreach($category as $newcategory)
                                    <option value={{$newcategory->id}}>{{$newcategory->name}}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" >Product Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                @foreach($product as $newproduct)
                                <input type="text"  required="required" value="{{$newproduct->name }}" class="form-control " name="pname">
                                @endforeach
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">slug <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                @foreach($product as $newproduct)
                                <input type="text" id="last-name" name="slug" required="required" class="form-control"  value="{{$newproduct->slug }}">
                                @endforeach
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Size <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              @foreach($product as $newproduct)
                              <input type="text" id="size" name="size" required="required" class="form-control"value="{{$newproduct->size }}">
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

                           <!--  <div class="item form-group">

                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Upload Image</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-input" type="file" name="image">
                                </div>
                            </div>
                        -->

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Description<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                @foreach($product as $newproduct)
                                <input type="text" id="first-name" required="required" value="{{$newproduct->description}}" class="form-control " name="description">
                            </div>
                            @endforeach
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">price <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                @foreach($product as $newproduct)
                                <input type="text" id="last-name" value="{{$newproduct->price}}" name="price" required="required" class="form-control">
                                @endforeach
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Quantity <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              @foreach($product as $newproduct)
                              <input type="number" id="last-name" value="{{$newproduct->quantity}}" name="quantity" required="required" class="form-control">
                              @endforeach
                          </div>
                      </div>



                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success">Update Product</button>
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