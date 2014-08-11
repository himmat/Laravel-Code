
@section("content")

@if ($errors->any())

<ul style="color:red;">

{{ implode('', $errors->all('<li>:message</li>')) }}

</ul>

@endif

@if (Session::has('message'))

<p>{{ Session::get('message') }}</p>

@endif
	{{ Form::open(array('url' => 'register/action')) }}
 
        <p>Usename :</p>
 
        <p>{{ Form::text('username') }}</p>
 
        <p>Email :</p>
 
        <p>{{ Form::text('email') }}</p>
 
        <p>Password :</p>
 
        <p>{{ Form::password('password') }}</p>
 
        <p>Confirm Password :</p>
 
        <p>{{ Form::password('cpassword') }}</p>
        
        <p>Register :</p>
        
        <p>{{ Form::select('urole', array(1 => 'Visitor', 4 => 'Own Property')) }}</p>
 
        <p>{{ Form::submit('Submit') }}</p>
 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    {{ Form::close() }}
@stop
