@extends('admin')

@section('content')
    {!! Form::open([ 'route' => 'reservas.buscar', 'method' => 'GET']) !!}
    	 <div class="form-group">
        {!! Form::label('usuario', 'Busca el usuario:', ['for' => 'usuario'] ) !!}  
        <select name="usuario" class="form-control select">
            @foreach($usuarios as $result)
                <option value="{{ $result->id }}">{{ $result->nombres.' '.$result->apellidos }}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group">
            {!! Form::label('fecha', 'Dia de la reserva:', ['for' => 'fecha'] ) !!} 
           <div class="input-group">
                <input type="text" class="form-control calendario" name="fecha">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
            </div>
        </div>
        <div class="form-group row">
        <div class="col-md-6"><label class="label-control">hora de inicio</label><input type="time" name="hora_inicio" class="form-control"></div>
        <div class="col-md-6"><label class="label-control">hora de finalizacion</label><input type="time" name="hora_final" class="form-control"></div>
        </div>
		@include('reservas_salas.partials.fields')
        <button type="submit" class="btn btn-success">Reservar</button>
    {!! Form::close() !!}
@endsection

