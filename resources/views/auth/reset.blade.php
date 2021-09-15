@extends('main')

@section('title' , '| Forget My Password')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    <form action="password/reset" method=POST>
                        @csrf
                            <label for="email">Email Adress</label>
                            <input type="email" name="email" id="email" value="{{ $email }}" class="form-control">

                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control">

                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control">

                            <input type="submit" value="Reset Password" class="btn  ">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection