@if(session('success'))
    <div class="alert alert-info">
        {{session('success')}}
    </div>
    @elseif(session('error-message'))
        <div class="alert alert-danger">
            {{session('error-message')}}
        </div>
@elseif(session('trash-message'))
    <div class="alert alert-info">
        <?php list($message, $postId) = session('trash-message') ?>
        {{$message}}
        {!! Form::open(['method' => 'put', 'route' => ['backend.blog.restore', $postId]]) !!}
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i>Undo</button>
        {!! Form::close() !!}
    </div>
@endif
