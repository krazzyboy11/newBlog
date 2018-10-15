@extends('layouts.backend.main')

@section('title','My blog | Edit category ')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Category
                <small>Edit category</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>

                </li>
                <li>
                    <a href="{{route('backend.category.index')}}"><i class="fa fa-dashboard"></i> Category</a>
                </li>
                <li class="active">Edit category</li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($category, [
                                'method' => 'PUT',
                                'route'  => ['backend.category.update', $category->id],
                                'files'  =>TRUE,
                                'id'     =>'category-form'
                            ]) !!}
                @include('backend.categories.form')
                {!! Form::close() !!}

            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

@endsection

@include('backend.blog.script')
