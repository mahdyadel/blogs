@extends('main')
@section('title' , "| Edit Tag")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('tags.update' , $tag->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('put') }}                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $tag->name }}" class="form-control">


                    <input type="submit" class="btn btn-success" style="margin-top:20px" value="Save Change">
            </form>
        </div>
    </div>
@endsection