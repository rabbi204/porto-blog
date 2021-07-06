@extends('admin.layouts.app')

@section('main-content')

<!-- Main Wrapper -->
<div class="main-wrapper">


    <!-- Header -->
    @include('admin.layouts.header')
    <!-- /Header -->

    <!-- Sidebar -->
    @include('admin.layouts.menu')
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user() -> name }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Category</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12">
                   <a class="btn btn-sm btn-primary" data-toggle="modal" href="#add_category_modal">Add New Category</a>
                    <div class="card">
                        @include('validate')
                        <div class="card-header">
                            <h4 class="card-title">All Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Category Slug</th>
                                            <th>Status</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach( $all_data as $data)
                                        <tr>
                                            <td>{{ $loop -> index + 1 }}</td>
                                            <td>{{ $data -> name }}</td>
                                            <td>{{ $data -> slug }}</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" status_id="{{ $data -> id }}" {{ $data -> status == true ? 'checked="checked"' : '' }} id="cat_status_{{ $loop -> index + 1 }}" class="check cat_check" >
                                                    <label for="cat_status_{{ $loop -> index + 1 }}" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>

                                            {{-- <td>
                                                @if( $data -> status == true )
                                                  <span class="badge badge-success">Published</span>
                                                 @else
                                                  <span class="badge badge-danger">UnPublished</span>
                                                @endif
                                            </td> --}}

                                            <td>{{ date('d F Y',strtotime($data -> created_at)) }}</td>
                                            <td>
                                                {{-- <a class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                                                <a  edit_id="{{ $data -> id }}" class="btn btn-sm btn-warning edit_cat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                                <form class="d-inline" action="{{ route('category.destroy', $data -> id ) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
</div>
<!-- /Main Wrapper -->

 {{-- category add modal --}}
 <div id="add_category_modal" class="modal fade">
    <div class="modal modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h2>Add New Category</h2>
                 <hr>
                 <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" type="text" class="form-control">
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-primary">
                     </div>
                 </form>
            </div>
        </div>
    </div>
 </div>

  {{-- Edit Catagory  modal --}}
  <div id="edit_category_modal" class="modal fade">
    <div class="modal modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h2>Update Category</h2>
                 <hr>
                 <form action="{{ route('category.update', $data ->id ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" type="text" class="form-control">
                        <input name="edit_id" type="hidden" class="form-control">
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-primary">
                     </div>
                 </form>
            </div>
        </div>
    </div>
 </div>


@endsection
