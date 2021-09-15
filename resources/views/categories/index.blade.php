@extends('main')

@section('title' , '|  All Categories')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <th>{{ $category->name }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- end of .col-md-8 -->
        <div class="col-md-3">
            <div class="well">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <h2>New Category</h2>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your Name" class="form-control">
                    <input type="submit" class="btn btn-primary btn-block" value="Create New Category">
                </form>
            </div>
        </div>
    </div>

@endsection