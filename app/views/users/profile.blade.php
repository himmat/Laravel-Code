
@section('content')
<div class="page-title"> 
	<i class="icon-custom-left"></i>
	<h3>
		<span class="semi-bold">Profile</span>
	</h3>
</div>

<!-- body content -->
<div class="row-fluid">
     <div class="span12">
          <div class="grid simple ">
			<br><br>
			<div class="grid-body postion ">
            	Username : {{ Auth::user()->username }}<br>
                Email : {{ Auth::user()->email }}
			</div>
		</div>
     </div>
</div>
  

@stop
