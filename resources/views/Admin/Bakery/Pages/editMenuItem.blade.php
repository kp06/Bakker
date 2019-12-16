@section('title','Edit Menu Items')
@extends('Admin.layouts.header')
@section('content-section')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Menu-Item</h3>
            </div>


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Home <small>Edit Menu-Item</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @if(Session::has('success-message'))
                        <div class="alert alert-danger">
                            {{Session::get('success-message')}}

                        </div>
                        @endif
                        @foreach($menuitem as $newmenuitem)
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{Route('update.menu.item',[$newmenuitem->id])}}">
                            @endforeach
                            {{csrf_field()}}
                            <div class="item form-group ">

                                <label class="col-form-label col-md-3 col-sm-3 label-align  ">Select Parent<span class="required">*</span></label>

                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="pid">
                                    
                                        @foreach($menu as $newmenu)
                                        <option value="{{$newmenu->id}}">{{$newmenu->title}}</option>
                                        @endforeach
                                       

                                    </select>

                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    @foreach($menuitem as $newmenuitem)
                                    <input type="text" id="first-name" value="{{$newmenuitem->name}}" required="required" class="form-control " name="name">
                                    @endforeach
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">slug <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                @foreach($menuitem as $newmenuitem)
                                    <input type="text" id="last-name" name="slug" value="{{$newmenuitem->slug}}"  required="required" class="form-control">
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

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Update Menu Item</button>
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