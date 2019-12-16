@section('title','manage-category')
@extends('Admin.layouts.header')
@section('content-section')




<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>MAnage Bakery Category</h3>
            </div>


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Home <small>Manage</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    
                        <br />
                        @if(Session::has('success-message'))
                        <div class="alert alert-danger">
                            {{Session::get('success-message')}}

                        </div>
                        @endif
                         @foreach($baker as $newbaker)
                      
                         <div class="x_content">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="post" action="{{Route('actManageCategory')}}">
                            {{csrf_field()}}
                            <div class="form-group row">
                               
                                <input type="hidden" name="bid" value={{$newbaker->id}}>
                        <label class="col-md-3 col-sm-3  control-label">{{$newbaker->name}}
                          <br>
                    
                        </label>

                        <div class="col-md-9 col-sm-9 ">
                            @foreach($category as $newcategory)
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" class="flat" name="cid[]" value={{$newcategory->id}}> {{$newcategory->name}}
                            </label>
                          </div>
                          @endforeach
                         
                        
                        </div>
                      </div>
           


                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3 ">
                                    <button type="submit" class="btn btn-success btn-sm">Add Relation</button>
                                    <button class="btn btn-primary btn-sm" type="button">Cancel</button>
                                    <button class="btn btn-primary btn-sm" type="reset">Reset</button>

                                </div>
                            </div>
                            <hr>

                        </form>
                    </div>
                   
                               @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection