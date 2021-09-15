@extends('main')
@section('title' , '| Contact')

@section('content')
            <div class="row">
                <div class="col-md-12">
                <h1>Contact Me  </h1>                 
                <hr>
                <form action="{{ url('contact') }}" method="post">
                 @csrf
                    <div class="form-group">
                        <label name="email" >Email:</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="subject" >Subject:</label>
                        <input type="subject" id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="meaage" >Meaage:</label>
                        <textarea type="meaage" id="meaage" name="meaage" class="form-control"> Type your message here...</textarea>
                    </div>
                    <input type="submit" class="btn btn-success" value="Send Message">

                </form>
                </div>
            </div><!--end of header.row  -->
     @endsection