@section('title','show-Product')
@extends('Admin.layouts.header')
@section('content-section')
<div class="right_col" role="main">
  <div class="row">

    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Bakery <small>View Product</small></h2>
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
                <th>Size</th>
               
                <th>Is_Active</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($category as $newcategory)
              @foreach($newcategory->product()->get() as $newproduct)
              
              <tr>
                <th scope="row">{{$newproduct->id}}</th>
                <td class="w-15"><img src="{{asset('admin/images/product/'.$newproduct->image)}}" height="100" width="100"></td>
                <td>{{$newproduct->name}}</td>
                <td>{{$newproduct->slug}}</td>
                <td>{{$newproduct->description}}</td>
                <td>{{$newproduct->size}}</td>
                <td>{{  $newproduct->is_active == 1? "yes" : "no" }}</td>
               
               
                <td>{{$newproduct->price}}</td>
                <td>{{$newproduct->quantity}}</td>
                <td>{{$newcategory->name}}</td>
                @can('category')
                <td><a href="{{Route('deleteproduct',[$newproduct->slug])}}" onclick="return confirm('are you sure want to delete this category')"><i class="fa fa-trash-o"></i></a>&nbsp;<a href="{{Route('showeditproduct',[$newproduct->slug])}}" ><i class="fa fa-edit"></i></a></td>
                @endcan
              </tr>
              @endforeach
              @endforeach
             
             
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection