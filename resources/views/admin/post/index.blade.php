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
                            <li class="breadcrumb-item active">Post</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12">
                   <a class="btn btn-sm btn-primary" href="{{ route('post.create') }}">Add New Post</a>
                    <div class="card">
                        @include('validate')
                        <div class="card-header">
                            <h4 class="card-title">All Posts (Published)</h4><br>
                            <a href="{{ route('post.index') }}" class="badge badge-primary">Published {{ ( $published == 0 ? '' :  $published ) }}</a>
                            <a href="{{ route('post.trash') }}" class="badge badge-danger">Trash  {{ ( $trash == 0 ? '' : $trash ) }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Post Name</th>
                                            <th>Post Type</th>
                                            <th>Post Category</th>
                                            <th>Post Tag</th>
                                            <th>Status</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach( $all_data as $data)

                                        @php
                                            $featured_data = json_decode($data -> featured );
                                        @endphp

                                        <tr>
                                            <td>{{ $loop -> index + 1 }}</td>
                                            <td>{{ $data -> title }}</td>
                                            <td>{{ $featured_data -> post_type }}</td>
                                            <td>category</td>
                                            <td>tag</td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" status_id="{{ $data -> id }}" {{ $data -> status == true ? 'checked="checked"' : '' }} id="post_status_{{ $loop -> index + 1 }}" class="check post_check" >
                                                    <label for="post_status_{{ $loop -> index + 1 }}" class="checktoggle">checkbox</label>
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
                                                <a class="btn btn-sm btn-danger" href="{{ route('post.trash.update', $data -> id ) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>


                                                {{-- <form class="d-inline" action="{{ route('category.destroy', $data -> id ) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form> --}}


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


@endsection
