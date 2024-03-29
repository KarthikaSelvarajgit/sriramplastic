@extends("layouts.appLayout")
@section('content')
<h1>Contact Us</h1>
{!! Form::open(['url'=>'contact/submit', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}
  <div class="form-group">
    {{Form::label('name','Name')}}
    {{Form::text('name','',['class'=>'form-control','placeholder'=>'Enter Name'])}}
  </div>
  <div class="form-group">
    {{Form::label('email','E-Mail')}}
    {{Form::text('email','',['class'=>'form-control','placeholder'=>'Enter Email ID'])}}
  </div>
  <div class="form-group">
    {{Form::label('message','Message')}}
    {{Form::textarea('message','',['class'=>'form-control','placeholder'=>'Enter Message'])}}
  </div>
  <div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
  </div>
{!! Form::close() !!}
@endsection
