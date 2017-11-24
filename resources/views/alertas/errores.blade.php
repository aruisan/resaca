@if(Session::has('message-error'))
<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="buton" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
	<label class="text-center">{{Session::get('message-error')}}</label>
</div>

@endif