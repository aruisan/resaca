@extends('admin')

@section('content')
@include('alertas.request')
    
     {!! Form::model($reservas, [ 'route' => ['misSalas.update', $reservas], 'method' => 'PUT']) !!}

         <div class="form-group row">
             <div class="col-md-12"> 
                {!! Form::label('sala_id', 'Escoge una Sala:', ['for' => 'aula'] ) !!}                
                   <select name="sala_id" id="seleccion" class="form-control select">
                @foreach($elementos as $elemento)
                    <option value="{{ $elemento->id }}" @if($reservas->sala_id == $elemento->id)selected="selected"@endif >{{ $elemento->nombre}}</option>
                @endforeach
                    </select>
            </div>
        </div>

        <div class="form-group row">      
                <div class="col-md-6">
                    {!! Form::label('fecha', 'Dia de la reserva:', ['for' => 'fecha'] ) !!} 
                  <div class="input-group date">
                    <input name="fecha_servicio" id="fecha_servicio" type="date" class="form-control" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="{{$reservas->fecha_servicio}}">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                  </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-2">
                        <label class="label-control">hora de inicio</label>
                    <div class="input-group">
                       <input name="hhInicio" type="text"  class="btn  form-control" value="{{$reservas->hora_inicio}}" />
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                </div>

                 <div class="col-md-2 hh_final">
                        <label class="label-control">hora de Finalizacion</label>
                    <div class="input-group">
                       <input name="hhFinal" type="text" class="btn  form-control" value="{{$reservas->hora_final}}"/>
                       <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                </div>
       </div> 


       <div class="form-group row">
           <div class="col-md-12">
              <label class="label-control">detalles de la Reserva</label>
              <textarea name="detalle_reserva" class="form-control" rows="2">{{$reservas->detalle_reserva }}</textarea>
            </div>
       </div>

        @include('reservas_salas.partials.fields')
        <button type="submit" class="btn btn-success">Guardar cambios</button>
    {!! Form::close() !!}
@endsection