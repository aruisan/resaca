@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="buton" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
	<label class="text-center">{{Session::get('message')}}</label>
</div>

@endif