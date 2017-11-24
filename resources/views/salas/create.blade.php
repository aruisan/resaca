@extends('admin')
@section('content')
@include('alertas.request')
    {!! Form::open([ 'route' => 'salas.store', 'method' => 'POST']) !!}
        @include('salas.partials.fields')

        <button type="submit" class="btn btn-success">Guardar</button>
    {!! Form::close() !!}
@endsection