@extends('admin')

@section('content')
	@include('alertas.request')
    {!! Form::open([ 'route' => 'tipo_elementos.store', 'method' => 'POST']) !!}
        @include('tipo_elementos.partials.fields')
        <button type="submit" class="btn btn-success">Guardar</button>
    {!! Form::close() !!}
@endsection