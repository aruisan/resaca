@extends('admin')

@section('content')
@include('alertas.request')
    
    {!! Form::model($reservas, [ 'route' => ['misreservas.update', $reservas], 'method' => 'PUT']) !!}


         <div class="form-group row">
      
              <input type="hidden" name="usuario_id" value=1>
             <div class="col-md-12"> 
                {!! Form::label('aula', 'Escoge el Aula:', ['for' => 'aula'] ) !!}                
                   <select name="sala_id" id="sala" class="form-control select">
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
                    <input name="fecha_servicio" id="fecha_servicio" type="text" class="form-control calendario" value="{{$reservas->fecha_servicio}}">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                  </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-2">
                        <label class="label-control">hora de inicio</label>
                    <div class="input-group">
                       <input name="hora_inicio" type="text"  class="btn  form-control hora1" value="{{$reservas->hora_inicio}}"/>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                </div>

                 <div class="col-md-2">
                        <label class="label-control">hora de Finalizacion</label>
                    <div class="input-group">
                       <input name="hora_final" type="text" class="btn  form-control hora2" value="{{$reservas->hora_final}}"/>
                       <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                </div>
       </div> 


       <div class="form-group row">
            <div class="col-md-12">
              {!! Form::label('detalle_reserva', 'detalle_reserva:', ['for' => 'detalle_reserva'] ) !!} 
              <textarea name="detalle_reserva" class="form-control" rows="2">{{$reservas->detalle_reserva }}</textarea>
              </div>
       </div>

        @include('reservas_salas.partials.fields')
        <button type="submit" class="btn btn-success">Guardar cambios</button>
    {!! Form::close() !!}
@endsection