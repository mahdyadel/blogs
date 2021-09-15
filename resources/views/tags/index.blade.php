@extends('main')

@section('title' , '|  All Tags')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <th> <a href="{{ route('tags.show' , $tag->id) }}">{{ $tag->name }}</a></th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- end of .col-md-8 -->
        <div class="col-md-3">
            <div class="well">
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <h2>New Tag</h2>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your Name" class="form-control">
                    <input type="submit" class="btn btn-primary btn-block" value="Create New Tag">
                </form>
            </div>
        </div>
    </div>

@endsection