@extends('layouts.backend.main')

@section('title','My blog | Blog index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Display all blog post</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>

                </li>
                <li>
                    <a href="{{url('backend.blog.index')}}"><i class="fa fa-dashboard"></i> Blog</a>
                </li>
                <li class="active">All Posts</li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header clearfix">
                            <div class="pull-left">
                                <a href="{{route('backend.blog.create')}}" class="btn btn-success">Add new</a>
                            </div>
                            <div class="pull-right" style="padding: 7px 0;">
                                <?php $links = [] ?>
                                @foreach($statusList as $key => $value)
                                    @if($value)
                                        <?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
                                        <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a>" ?>
                                    @endif
                                @endforeach
                                    {!! implode(' | ', $links) !!}
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

                            @if(!$posts->count())
                                <div class="alert alert-danger">
                                    <strong>No record found</strong>
                                </div>
                            @else
                                @if($onlyTrashed)
                                    @include('backend.blog.table-trash')
                                @else
                                    @include('backend.blog.table')
                                @endif
                            @endif
                        </div>
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                {{$posts->appends(Request::query())->render()}}

                            </div>
                            <div class="pull-right">
                                <small>{{$postCount}} {{str_plural('Item', $postCount)}}</small>
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
