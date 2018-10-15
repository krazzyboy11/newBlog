@extends('layouts.backend.main')

@section('title','My blog | Categories')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Categories
                <small>Display all Categories</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>

                </li>
                <li>
                    <a href="{{url('backend.category.index')}}"><i class="fa fa-dashboard"></i> Categories</a>
                </li>
                <li class="active">All Categories</li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header clearfix">
                            <div class="pull-left">
                                <a href="{{route('backend.category.create')}}" class="btn btn-success">Add new</a>
                            </div>
                            <div class="pull-right" style="padding: 7px 0;">

                                {{--<a href="?status=all">All</a> |
                                <a href="?status=published">Published</a> |
                                <a href="?status=scheduled">Scheduled</a> |
                                <a href="?status=draft">Draft</a> |
                                <a href="?status=trash">Trash</a>--}}
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            @include('backend.partials.message')

                            @if(!$categories->count())
                                <div class="alert alert-danger">
                                    <strong>No record found</strong>
                                </div>
                            @else
                                @include('backend.categories.table')
                            @endif
                        </div>
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                {{$categories->appends(Request::query())->render()}}

                            </div>
                            <div class="pull-right">
                                <small>{{$categoriesCount}} {{str_plural('Item', $categoriesCount)}}</small>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection
