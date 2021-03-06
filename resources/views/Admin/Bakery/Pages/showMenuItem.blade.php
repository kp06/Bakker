@section('title','Menus-Items')
@extends('Admin.layouts.header')
@section('content-section')
<div class="right_col" role="main">
    <div class="row">

        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Bakery <small>View Menu-Item</small></h2>
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
                                <th>Name</th>
                                <th>Slug</th>

                                <th>Parent</th>
                                <th>Is_Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menuitem as $newmenuitem)


                            <tr>
                                <th scope="row">{{$newmenuitem->id}}</th>

                                <td>{{$newmenuitem->name}}</td>
                                <td>{{$newmenuitem->slug}}</td>
                                @foreach($newmenuitem->menu()->get() as $newmenu)
                                <td><a href="">{{$newmenu->title}} </a></td>
                                @endforeach
                            

                                <td>{{ $newmenuitem->is_active == 1? "yes" : "no" }}</td>
                                @can('category')

                                <td><a href="{{Route('delete.menu.item',[$newmenuitem->id])}}" onclick="return confirm('are you sure want to delete this category')"><i class="fa fa-trash-o"></i></a>&nbsp;<a href="{{Route('show.edit.menuItem',[$newmenuitem->slug])}}"><i class="fa fa-edit"></i></a></td>
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