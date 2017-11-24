@extends('admin')

@section('content')
    @include('alertas.request')
    {!! Form::model($user, [ 'route' => ['users.update', $user], 'method' => 'PUT']) !!}
       <div class="form-group">
		</div>
        @include('users.partials.fields')
        <div class="form-group">
		    {!! Form::label('admin', 'admin', ['for' => 'admin'] ) !!}
		    <select name="admin" class="form-control">
		    	<option value="1" @if($user->admin == 1)selected="selected"@endif>Administrador</option>
		    	<option value="0" @if($user->admin == 0)selected="selected"@endif>Normal</option>
		    </select>
		</div>
        <button type="submit" class="btn btn-success">Guardar cambios</button>
    {!! Form::close() !!}
@endsection