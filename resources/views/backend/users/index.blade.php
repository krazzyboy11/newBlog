@extends('layouts.backend.main')

@section('title','My blog | Users')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <small>Display all Users</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>

                </li>
                <li>
                    <a href="{{url('backend.users.index')}}"><i class="fa fa-dashboard"></i> Users</a>
                </li>
                <li class="active">All Users</li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header clearfix">
                            <div class="pull-left">
                                <a href="{{route('backend.users.create')}}" class="btn btn-success">Add new user</a>
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

                            @if(!$users->count())
                                <div class="alert alert-danger">
                                    <strong>No record found</strong>
                                </div>
                            @else
                                @include('backend.users.table')
                            @endif
                        </div>
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                {{$users->appends(Request::query())->render()}}

                            </div>
                            <div class="pull-right">
                                <small>{{$usersCount}} {{str_plural('Item', $usersCount)}}</small>
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
