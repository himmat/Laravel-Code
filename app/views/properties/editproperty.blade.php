
@section("content")

@if ($errors->any())

<ul style="color:red;">

{{ implode('', $errors->all('<li>:message</li>')) }}

</ul>

@endif

@if (Session::has('message'))

{{ Session::get('message') }}

@endif
	{{ Form::open(array('url' => "property/update/$property->id",  'class' => 'smart-green')) }}
     <h1>Edit property
        <span>Please fill all the texts in the fields.</span>
    </h1>
     <label>   <span>Name :</span>
 
        {{ Form::text('name', Input::old('name', $property->name)) }}
 </label>
     <label>   <span>Property type :</span>
 
        {{  Form::select('type', array('1' => 'Flat', '2' => 'Apartment', '3' => 'House', '4' => 'Villa', '5' => 'Estate'),  Input::old('type', $property->type)); }} </label>
 
  <label>      <span>Address :</span>
 
        {{ Form::textarea('address', Input::old('address', $property->address)) }}
 </label>
    <label>    <span>To :<span>
 
        {{  Form::select('to', array('1' => 'Buy', '2' => 'Rent'), Input::old('to', $property->to)); }}
</label>
   <label>    <span>Min price :</span>
 
        {{ Form::text('minprice', Input::old('minprice', $property->minprice)) }}
</label>
     <label>   <span>Max price :</span>
 
        {{ Form::text('maxprice', Input::old('maxprice', $property->maxprice)) }}
</label>
   <label>     <span>Bedrooms :</span>
 
        {{ Form::text('bedrooms', Input::old('bedrooms', $property->bedrooms)) }}
</label>
    <label>    <span>Bathrooms :</span>
 
        {{ Form::text('bathrooms',Input::old('bathrooms', $property->bathrooms)) }}
</label>
<label>	<span>Area :</span>
 
        {{ Form::text('area',Input::old('area', $property->area)) }}
 </label>
        {{ Form::submit('Submit', array( 'class' => 'button')) }}
 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    {{ Form::close() }}
@stop
