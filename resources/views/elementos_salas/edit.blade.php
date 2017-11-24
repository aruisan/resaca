@extends('admin')

@section('content')
    @include('alertas.request')
    {!! Form::model($elementos_salas, [ 'route' => ['elementos_salas.update', $elementos_salas], 'method' => 'PUT']) !!}
		<div class="form-group">
        {!! Form::label('salas', 'salas', ['for' => 'salas'] ) !!}
        <select name="sala_id" class="form-control select">
            @foreach($sala as $result)
                <option value="{{ $result->sala_id }}">{{ $result->nombre }}</option>
            @endforeach
            @foreach($salas as $result2)
                <option value="{{ $result2->id }}">{{ $result2->nombre }}</option>
            @endforeach
        </select>
		</div>
		 <div class="form-group">
         {!! Form::label('select2', 'elementos', ['for' => 'elementos'] ) !!}
           <select name="elemento_id" class="form-control select">
            @foreach($elemento as $result3)
                <option value="{{$result3->elemento_id}}">{{$result3->nombre}}</option>
            @endforeach
            @foreach($elementos as $result4)
                <option value="{{$result4->id}}">{{$result4->nombre}}</option>
            @endforeach
        </select>
		</div>
        @include('elementos_salas.partials.fields')
        <button type="submit" class="btn btn-success">Guardar cambios</button>
    {!! Form::close() !!}
@endsection