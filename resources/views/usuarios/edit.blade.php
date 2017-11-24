@extends('admin')

@section('content')
    
    {!! Form::model($reservas, [ 'route' => ['reservas.update', $reservas], 'method' => 'PUT']) !!}


         <div class="form-group row">
            <div class="col-md-6">    
        {!! Form::label('usuario', 'Busca el usuario:', ['for' => 'usuario'] ) !!}  
        <select name="usuario_id" class="form-control select">
             @foreach($usuario as $result)
                <option value="{{ $result->usuario_id }}">{{ $result->nombres.' '.$result->apellidos }}</option>
            @endforeach
            @foreach($usuarios as $result1)
                <option value="{{ $result1->id }}">{{ $result1->nombres.' '.$result1->apellidos }}</option>
            @endforeach
        </select>
            </div>

             <div class="col-md-6"> 
                {!! Form::label('aula', 'Escoge el Aula:', ['for' => 'aula'] ) !!}                
                   <select name="sala_id" class="form-control select">
                @foreach($sala as $result2)
                    <option value="{{ $result2->sala_id }}">{{ $result2->nombre}}</option>
                @endforeach
                @foreach($salas as $result3)
                    <option value="{{ $result3->id }}">{{ $result3->nombre}}</option>
                @endforeach
                    </select>
            </div>
        </div>

        <div class="form-group row">      
                <div class="col-md-6">
                    {!! Form::label('fecha', 'Dia de la reserva:', ['for' => 'fecha'] ) !!} 
                  <div class="input-group date">
                    <input name="fecha_servicio" type="text" class="form-control calendario" value="{{$reservas->fecha_servicio}}">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                  </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-2">
                        <label class="label-control">hora de inicio</label>
                    <div class="input-group">
                       <input name="hora_inicio" type="text" class="form-control hora" value="{{$reservas->hora_inicio}}"/>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                </div>

                 <div class="col-md-2">
                        <label class="label-control">hora de Finalizacion</label>
                    <div class="input-group">
                       <input name="hora_final" type="text" class="form-control hora" value="{{$reservas->hora_final}}"/>
                       <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                </div>
       </div> 

        @include('reservas_salas.partials.fields')
        <button type="submit" class="btn btn-success">Guardar cambios</button>
    {!! Form::close() !!}
@endsection