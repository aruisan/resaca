@extends('admin')

@section('content')
@include('alertas.request')
    {!! Form::open([ 'route' => 'elementos_salas.store', 'method' => 'POST']) !!}
        <div class="form-group">
        {!! Form::label('salas', 'salas', ['for' => 'salas'] ) !!}
        <select name="sala_id" class="form-control select">
            @foreach($salas as $result)
                <option value="{{ $result->id }}">{{ $result->nombre }}</option>
            @endforeach
        </select>
        </div>
         <div class="form-group">
         {!! Form::label('elementos', 'elementos', ['for' => 'elementos'] ) !!}
           <select name="elemento_id"  class="form-control select">
            @foreach($elementos as $result2)
                <option value="{{$result2->id}}">{{$result2->nombre}}</option>
            @endforeach
        </select>
        </div>
		@include('elementos_salas.partials.fields')
        <button type="submit" class="btn btn-success">Guardar</button>
    {!! Form::close() !!}
@endsection

