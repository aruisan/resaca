@extends('admin')

@section('content')
    @include('alertas.request')
    {!! Form::model($elementos, [ 'route' => ['elementos.update', $elementos], 'method' => 'PUT']) !!}
        @include('elementos.partials.fields')
         <div class="form-group">
        {!! Form::label('tipo', 'tipo', ['for' => 'tipo_elemento_id'] ) !!}  
        <select name="tipo_elemento_id" class="form-control select">
            @foreach($tipo as $result)
                <option value="{{ $result->tipo_elemento_id }}">{{ $result->descripcion }}</option>
            @endforeach
            @foreach($tipos as $result2)
                <option value="{{ $result2->id }}">{{ $result2->descripcion }}</option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar cambios</button>
    {!! Form::close() !!}
@endsection