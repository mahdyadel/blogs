@extends('main')

@section('title' , '|View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            
            <h1>{{ $post->title }}</h1>
            <p class="lead"> {{ $post->body }}</p>
            <hr>
            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>

        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label><br>
                    <p><a href="{{ url('blogs/'. $post->slug) }} ">{{ url( $post->slug) }}</a></p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Category:</label><br>
                    <p>{{ $post->category->name }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Create At:</dt>
                    <dd>{{ date('M j , Y h:ia' , strtotime( $post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j , Y h:ia' , strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('posts.edit' , $post->id) }}" class="btn btn-primary btn-block">Edit</a> 
                    </div>
                    <div class="col-sm-6">
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger delete btn-block"><i class="fa fa-trash"></i> Delete</button>
                    </form><!-- end of form -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('posts.index') }}" class="btn btn-default btn-block btn-h1-spacing" ><< See All Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection