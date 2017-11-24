@extends('admin')
@section('content')
@include('alertas.request')
    {!! Form::open([ 'route' => 'users.store', 'method' => 'POST']) !!}
        @include('users.partials.fields')
        <div class="form-group">
		    {!! Form::label('admin', 'admin', ['for' => 'admin'] ) !!}
		    <select name="admin" class="form-control">
		    	<option value="1">Administrador</option>
		    	<option value="0">Normal</option>
		    </select>
		</div>
        <button type="submit" class="btn btn-success">Guardar</button>
    {!! Form::close() !!}
@endsection