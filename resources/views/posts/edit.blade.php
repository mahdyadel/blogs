@extends('main')

@section('title' , '|Edit Post')

@section('stylesheet')

<link rel="stylesheet" href="{{ url('blog/css/select2.min.css') }}" />

@endsection

@section('content')

    <div class="row">
    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data" >

            {{ csrf_field() }}
            {{ method_field('put') }}

        <div class="col-md-8">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control input-lg">
            <hr>

            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ $post->slug }}" class="form-control input-lg">
            <hr>



            <label for="category_id">Categories</label><br>
            <select name="category_id" id="category_id" class="form-control">
             @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
           
            </select>

            <label for="tags">Tags</label><br>
           <select class="form-control select2-multi"  name="tags[]"  multiple="multiple">
            @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
             
          </select>

            
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea><br>
          
        </div>
     
        <div class="col-md-4">
            <div class="well">
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
                        <a href="{{ route('posts.show' , $post->id) }}" class="btn btn-danger btn-block">Cancel</a> 
                    </div>
                    <div class="col-sm-6">
                    <button class="btn btn-success btnblock">Save Change</button>
                    <!-- <a href="{{ route('posts.update' , $post->id) }}" class="btn btn-success btn-block">Save Change</a>  -->
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    @section('script')
  <script src="{{ url('blog/js/select2.min.js') }}"></script>

  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>

  @endsection

@endsection