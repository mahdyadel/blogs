@extends('main')

@section('title' , '| Forget My Password')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    <form action="password/email" method=POST>
                        @csrf
                            <label for="email">Email Adress</label>
                            <input type="email" name="email" id="email" class="form-control">
                            <input type="submit" value="Reset Password" class="btn  ">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection