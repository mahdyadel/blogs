@extends('main')

@section('title' , '| Create New Post ')

@section('stylesheet')

<link rel="stylesheet" href="{{ url('blog/css/select2.min.css') }}" />

@endsection


@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post </h1>
            <hr>

      
          <form action="{{ route('posts.store') }}" method="post" >

                {{ csrf_field() }}
                {{ method_field('post') }}
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required >

            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" required >

            <label for="category_id">Categories</label><br>
            <select name="category_id" id="category_id" class="form-control">
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select><br>

            <label for="tags">Tags</label><br>
           <select class="form-control select2-multi"  name="tags[]"  multiple="multiple">
            @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
             
          </select>

            <label style="margin-top:20px" for="body">Post Body</label>
            <textarea type="text" name="body" class="form-control  ckeditor"  cols="30" rows="10" required></textarea><br>


          
          
            
            <input style="margin-top:20px" type="submit" value="Create Post" class="btn btn-primary btn-lg btn-block">

          </form>

        </div>
    </div>
    

  @section('script')
  <script src="{{ url('blog/js/select2.min.js') }}"></script>

  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>

  @endsection
 
@endsection

