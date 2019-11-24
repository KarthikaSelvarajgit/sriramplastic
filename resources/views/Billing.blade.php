@extends("layouts.appLayout")
@section('content')
<h1>Create Billing Order</h1>
<div class=''>
  {!! Form::open(['url'=>'billing/submit', 'method'=>'STORE', 'files' => true, 'role' => 'form','class'=>'form-horizontal']) !!}
  <div class="form-group">
    {{Form::label('millname','Mill Name* ',['class'=>'control-label'])}}
    {{Form::select('millname',$millnames,'',['class'=>'form-control','placeholder'=>'Select Mill Name'])}}
  </div>
  <div class = 'row'>
  <div name='left pane' class='col-md-6 col-lg-6 col-sm-6'>
    <div class="form-group">
      {{Form::label('to_address','To*',['class'=>'control-label'])}}
      {{Form::textarea('to_address','',['class'=>'controls form-control','rows'=>4,'placeholder'=>'Enter the address'])}}
    </div>
  </div>
  <div name='right pane' class='col-md-6 col-lg-6 col-sm-6'>
    <div class="form-group row">
      {{Form::label('invoice_date','Invoice Date*',['class'=>'control-label col-sm-4'])}}
      {{Form::date('invoice_date',\Carbon\Carbon::now(),['class'=>'form-control col-sm-8'])}}
    </div>
    <div class="form-group row">
      {{Form::label('invoice_no','Invoice Number*',['class'=>'control-label col-sm-4'])}}
      {{Form::text('invoice_no','',['class'=>'form-control col-sm-8','placeholder'=>'Enter GST No'])}}
    </div>
    <div class="form-group row">
      {{Form::label('gstno','GST Number*',['class'=>'control-label col-sm-4'])}}
      {{Form::text('gstno','',['class'=>'form-control col-sm-8','placeholder'=>'Enter GST No'])}}
    </div>
    <div class="form-group row">
      {{Form::label('pono','PO Number*',['class'=>'control-label col-sm-4'])}}
      {{Form::text('pono','',['class'=>'form-control col-sm-8','placeholder'=>'Enter PO No'])}}
    </div>
  </div>
</div>
<div id='bottom_pane'>
<div class='row' id='product_row' >
  <div class="form-group">
    {{Form::label('product_name','Product Name* ',['class'=>'control-label'])}}
    {{Form::select('product_name',$product_details,'',['class'=>'form-control','placeholder'=>'Select Mill Name'])}}
  </div>
  <div class="form-group">
    {{Form::label('HSN','HSN',['class'=>'control-label'])}}
    {{Form::text('HSN','',['class'=>'form-control','placeholder'=>'Enter HSN','size'=>'10 '])}}
  </div>
  <div class="form-group">
    {{Form::label('quantity','Quantity',['class'=>'control-label'])}}
    {{Form::input('number','quantity','',['class'=>'form-control','placeholder'=>'Enter Quantity'])}}
  </div>
  <div class="form-group">
    {{Form::label('rate','Rate',['class'=>'control-label'])}}
    {{Form::input('number','rate','',['class'=>'form-control','placeholder'=>'Enter Rate'])}}
  </div>
  <div class="form-group">
    {{Form::label('amount','Amount',['class'=>'control-label'])}}
    {{Form::input('number','amount','',['class'=>'form-control'])}}
  </div>
  <div class="form-group">
    {{Form::label('Remove','',['class'=>'control-label'])}}
    {{Form::button('Delete',['class'=>'btn btn-primary form-control delrow','size'=>'5'])}}
  </div>
</div>
</div>
<div class="form-group">
  {{Form::button('Add Row',['class'=>'btn btn-primary addrow'])}}
</div>
    <div>
      {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
  {!! Form::close() !!}
</div>
<div id="add"></div>
  <script type="text/javascript">
  var counter;
        $("[name= 'rate'],[name= 'quantity']").keyup(function()
        {
          var counter = this.getAttribute("counter");
          var amountid = "#amount";
          var rateid = "#rate";
          var quantityid = "#quantity";
          if(counter)
          {
            amountid +=counter;
            rateid +=counter;
            quantityid +=counter;
          }
          var rate = parseFloat($(rateid).val()) || 0;
          var quantity = parseFloat($(quantityid).val()) || 0;
          $(amountid).val(rate * quantity);
        });
        $("#millname").change(function()
        {
            $.ajax({
                url: "{{ route('billing.get_millDetails') }}?mill_id=" + $(this).val(),
                method: 'GET',
                success: function(data)
                {
                  console.log(data.address);
                  $('#to_address').val(data.address);
                  $('#gstno').val(data.gstno);
                  $('#pono').val(data.pono);
                }
            });
        });
        $("[name= 'product_name']").change(function()
        {
          console.log("entered");
          var counter = this.getAttribute("counter");
          var hsnid = "#HSN";
          if(counter)
            hsnid +=counter;
            $.ajax({
                url: "{{ route('billing.get_hsn') }}?product_id=" + $(this).val(),
                method: 'GET',
                success: function(data)
                {
                  console.log(data);
                  $(hsnid).val(data.product_hsn);
                }
            });
        });
        var counter=1;
        $(".addrow").click(function()
        {
          counter++;
          var clone = $('#product_row').clone(true,true);
          clone.find('[id]').each(function ()
          {
            this.id += counter;
            this.setAttribute('counter',counter);
          });
          clone.appendTo("#bottom_pane");
        });
        $(".delrow").click(function()
        {
          console.log(counter);
          if(counter>1)
          {
            this.parentNode.parentNode.remove();
            counter--;
          }
        });
    </script>
@endsection
