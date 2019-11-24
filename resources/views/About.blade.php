@extends("layouts.appLayout")
@section('content')
<h1>Add Mill Names</h1>
<div class=''>
  {!! Form::open(['url'=>'about/submit', 'method'=>'STORE', 'files' => true, 'role' => 'form', 'class'=>'form-horizontal']) !!}
    <div class="form-group">
      {{Form::label('millname','Mill Name*',['class'=>'control-label col-sm-2'])}}
      {{Form::text('millname','',['class'=>'form-control col-sm-10','placeholder'=>'Mill Name'])}}
    </div>
    <div class="form-group">
      {{Form::label('address','Address*')}}
      {{Form::textarea('address','',['class'=>'form-control','placeholder'=>'Enter the address'])}}
    </div>
    <div class="form-group">
      {{Form::label('gstno','GST Number*')}}
      {{Form::text('gstno','',['class'=>'form-control','placeholder'=>'Enter GST No'])}}
    </div>
    <div class="form-group">
      {{Form::label('pono','PO Number*')}}
      {{Form::text('pono','',['class'=>'form-control','placeholder'=>'Enter PO No'])}}
    </div>
    <div class="form-group">
      {{Form::label('email','Email ID')}}
      {{Form::text('email','',['class'=>'form-control','placeholder'=>'Enter the mill mail id'])}}
    </div>
    <div class="form-group">
      {{Form::label('price','Quoted Price')}}
      {{Form::text('price','',['class'=>'form-control','placeholder'=>'Enter the quotation price'])}}
    </div>
    <div class="form-group">
      {{Form::label('contact','Contact Person')}}
      {{Form::text('contact','',['class'=>'form-control','placeholder'=>'Enter the store manager name'])}}
    </div>
    <div class="form-group">
      {{Form::label('contactno','Contact Number')}}
      {{Form::text('contactno','',['class'=>'form-control','placeholder'=>'Enter the store manager mobile number'])}}
    </div>
    <div>
      {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
  {!! Form::close() !!}

@endsection
