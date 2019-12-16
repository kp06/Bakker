@section('title','Categories')
@extends('Admin.layouts.header')
@section('content-section')
<div class="right_col" role="main">
  <div class="row">

    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
      
          <h2>Home <small>Category</small></h2>
        
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

              </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        @if(Session::has('success-message'))
            <div class="alert alert-danger">
              {{Session::get('success-message')}}

            </div>
            @endif
          <table class="table  table-image  table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Images</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
             
               
                <th>Is_Active</th>
            
                <th>Product</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
               @foreach($category as $newcategory)
              
              
              
              <tr>
                <th scope="row">{{$newcategory->id}}</th>
                <td class="w-15"><img src="{{asset('admin/images/Category/'.$newcategory->image)}}" height="100" width="100"></td>
                <td>{{$newcategory->name}}</td>
                <td>{{$newcategory->slug}}</td>
                <td>{{$newcategory->description}}</td>
             
                <td>{{  $newcategory->is_active == 1? "yes" : "no" }}</td>
               
               
            
                
                <td><a href="{{Route('showcategoryproduct',[$newcategory->slug])}}">Products</a></td>
              
                @can('category')
                <td><a href="{{Route('deletecategory',[$newcategory->id])}}" onclick="return confirm('are you sure want to delete this category')"><i class="fa fa-trash-o"></i></a>&nbsp;<a href="{{Route('showeditcategory',[$newcategory->slug])}}" ><i class="fa fa-edit"></i></a></td>
                @endcan
              </tr>
              @endforeach
             
           
             
             
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection