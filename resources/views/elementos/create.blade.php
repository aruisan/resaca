@extends('admin')

@section('content')
@include('alertas.request')
    {!! Form::open([ 'route' => 'elementos.store', 'method' => 'POST']) !!}
        @include('elementos.partials.fields')
        <div class="form-group">
        {!! Form::label('tipo', 'tipo', ['for' => 'tipo_elemento_id'] ) !!}  
        <select name="tipo_elemento_id" class="form-control select">
            @foreach($tipo as $result)
                <option value="{{ $result->id }}">{{ $result->descripcion }}</option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    {!! Form::close() !!}
@endsection