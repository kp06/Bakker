@extends('Admin.layouts.header')
@section('title','add-product')
@section('content-section')




<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add New Product</h3>
            </div>


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Home <small>Add Product</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @if(Session::has('success-message'))
                        <div class="alert alert-danger">
                            {{Session::get('success-message')}}

                        </div>
                        @endif
                        <form id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{Route('storeProduct')}}">
                            {{csrf_field()}}
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Product Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" class="form-control " name="pname">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">slug <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="last-name" name="slug" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Size <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="size" name="size" required="required" class="form-control">
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
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Upload Image</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-input" type="file" name="image">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Description<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" class="form-control " name="description">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">price <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="last-name" name="price" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Quantity <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="last-name" name="quantity" required="required" class="form-control">
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Add Product</button>
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