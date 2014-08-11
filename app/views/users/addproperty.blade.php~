
@section("content")

@if ($errors->any())

<ul style="color:red;">

{{ implode('', $errors->all('<li>:message</li>')) }}

</ul>

@endif

@if (Session::has('message'))

<p>{{ Session::get('message') }}</p>

@endif
	{{ Form::open(array('url' => 'addproperty/action')) }}
 
        <p>Name :</p>
 
        <p>{{ Form::text('name') }}</p>
 
        <p>Property type :</p>
 
        <p>{{  Form::select('type', array('1' => 'Flat', '2' => 'Apartment', '3' => 'House', '4' => 'Villa', '5' => 'Estate')); }}</p>
 
        <p>Address :</p>
 
        <p>{{ Form::textarea('address') }}</p>
 
        <p>To :</p>
 
        <p>{{  Form::select('to', array('1' => 'Buy', '2' => 'Rent')); }}</p>

       <p>Min price :</p>
 
        <p>{{ Form::text('minprice') }}</p>

        <p>Max price :</p>
 
        <p>{{ Form::text('maxprice') }}</p>

        <p>Bedrooms :</p>
 
        <p>{{ Form::text('bedrooms') }}</p>

        <p>Bathrooms :</p>
 
        <p>{{ Form::text('bathrooms') }}</p>

	<p>Area :</p>
 
        <p>{{ Form::text('area') }}</p>
 
        <p>{{ Form::submit('Submit') }}</p>
 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    {{ Form::close() }}
@stop
