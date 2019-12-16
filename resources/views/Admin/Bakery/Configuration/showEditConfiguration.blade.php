@section('title','Edit Configuration')
@extends('Admin.layouts.header')
@section('content-section')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Configuration</h3>
            </div>


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Home <small>Edit Configuration</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @if(Session::has('success-message'))
                        <div class="alert alert-danger">
                            {{Session::get('success-message')}}

                        </div>
                        @endif
                       
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="post" action="{{Route('update.configuration',[$config->id])}}">
                           
                            {{csrf_field()}}
                         

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Key <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                          
                                    <input type="text" id="first-name" value="{{$config->key}}" required="required" class="form-control " name="key">
                                    
                                </div>
                            </div>
                            <div class="item form-group">
                               
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Value <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                
                                    <input type="text" id="last-name" value="{{$config->value}}" name="val" required="required" class="form-control">
                                   
                                </div>
                            </div>
                           

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Type<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                
                                    <input type="text" id="first-name" value="{{$config->type}}" required="required" class="form-control " name="type">
                                    
                                </div>
                            </div> 
                           
                          
                            
                         
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">update Configuration</button>
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