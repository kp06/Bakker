@section('title','show-admin')
@extends('Admin.layouts.header')
@section('content-section')
<div class="right_col" role="main">
  <div class="row">

    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Hover rows <small>Try hovering over the rows</small></h2>
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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Post</th>
                <th>Email</th>
                <th>Address</th>
                <th>gender</th>
                <th>phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($admin as $newadmin)
              @foreach($newadmin->userDetail()->get() as $userdetail)
              @foreach($newadmin->roles()->get() as $adminrole)
              <tr>
                <th scope="row">{{$newadmin->id}}</th>
                <td class="w-15"><img src="{{asset('admin/images/'.$userdetail->image)}}" height="100" width="100"></td>
                <td>{{$userdetail->first_name}}</td>
                <td>{{$userdetail->last_name}}</td>
                <td>{{$newadmin->name}}</td>
                <td>{{$adminrole->title}}</td>
                <td>{{$newadmin->email}}</td>
               
               
                <td>{{$userdetail->address}}</td>
                <td>{{$userdetail->gender}}</td>
                <td>{{$userdetail->phone}}</td>
                @can('delete')
                <td><a href="{{Route('deleteadmin',[$newadmin->id])}}" onclick="return confirm('are you sure want to delete this category')"><i class="fa fa-trash-o"></i></a></td>
                @endcan
              </tr>
              @endforeach
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