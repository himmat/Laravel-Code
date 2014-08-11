<div id="topbar">
    <ul>
      <li class="current"><a href="{{ url('users/index') }}">Home</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Contact us</a></li>
      <li><a href="{{ url('users/logout') }}"><i class="icon-off"></i>&nbsp;&nbsp;Log Out</a></li>
    
    </ul>
  </div>
  <div id="header">
    <div id="sitename">
      <a href="{{ URL::to('dashboard') }}"><h1 id="logo">RealOne</h1></a>
    </div>
    <div id="shoutout"><a href="{{ URL::to('dashboard') }}"><img src="{{ asset('assets/images/joinnow_shoutout.jpg') }}" class="logo"  data-src="{{ asset('assets/img/logo.png') }} " data-src-retina="{{ asset('assets/img/logo2x.png') }}" /></a></div>
    <div id="useractions">
      <div id="headings">
       @if(Auth::check())
            <ul>
                <li><a href="{{ URL::to('properties') }}">Manage Properties</a></li>
                <li><a href="{{ URL::to('users/profile') }}">My Profile</a></li>
                <li><a href="{{ URL::to('properties/addproperty') }}">My Profile</a></li>
                <li><a href="{{ URL::to('users/logout') }}">Logout</a></li>
             </ul>
            @else
        <h2><img src="{{ asset('assets/images/create_indi_usr.jpg') }}" alt="" width="25" height="22" /> <a href="{{ URL::to('users/register') }}">Create Account</a> </h2>
        
      </div>
      <div id="login">

	
                
          


        <p><strong>Already registered ?</strong> Login here to access your account</p>
        <div id="loginform">
         {{ Form::open( array( 'action' => 'UsersController@postSignin', 'method'=>'post') ) }}
            <div class="formblock">
              {{ Form::label('email', 'Email') }} 
              {{  Form::text('email', null,  array('class'=>'textfields')) }}
              <span class="help-inline">{{ $errors->first('email','<span class="error">:message</span>'); }}</span>
            </div>
            <div class="formblock">
              {{ Form::label('password', 'Password') }} 
              {{  Form::password('password',  array('class'=>'textfields')) }}<span class="help-inline">{{ $errors->first('password','<span class="error">:message</span>'); }}</span>
            </div>
            <div class="formblock">
              {{ Form::submit('Login', array('class'=>'btn btn-primary')) }}
            </div>
            <div class="clear">&nbsp;</div>
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          {{ Form::close() }}
            <p>
              <input name="" type="checkbox" value="" />
              Remember me on this computer | Forgot password ? </p>
           
        </div>
      </div>
      @endif
    </div>
  </div>
