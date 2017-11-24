@extends('admin')

@section('content')
@include('alertas.request')
    {!! Form::open([ 'route' => 'reservaSalas.store', 'method' => 'POST']) !!}
         <div class="form-group row">
            <div class="col-md-6">    
              {!! Form::label('usuario', 'Busca el usuario:', ['for' => 'usuario'] ) !!}  
              <select name="usuario_id"  class="form-control select">
                  @foreach($usuarios as $result)
                      <option value="{{ $result->id }}">{{ $result->name}}</option>
                  @endforeach
              </select>
            </div>

             <div class="col-md-6"> 
                {!! Form::label('aula', 'Escoge el Aula:', ['for' => 'aula'] )!!}                
                    <select name="sala_id" id="seleccion" class="select form-control">
                @foreach($salas as $result2)
                    <option value="{{ $result2->id }}">{{ $result2->nombre}}</option>
                @endforeach
                    </select>
            </div>
        </div>
        
        <div class="form-group row">      
                <div class="col-md-6">
                    {!! Form::label('fecha', 'Dia de la reserva:', ['for' => 'fecha'] ) !!} 
                    <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">

                  <div class="input-group date">
                    <input name="fecha_servicio"type="date" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"  required>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                  </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-2">
                        <label class="label-control">hora de inicio</label>
                    <div class="input-group">
                        <input name="hhInicio" type="time" class="form-control" value="00:00"/>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                </div>

                 <div class="col-md-2">
                        <label class="label-control">hora de Finalizacion</label>
                    <div class="input-group">
                       <input name="hhFinal" type="time" class="form-control" value="00:00"/>
                       <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                </div>
       </div> 

       <div class="form-group row">
           <div class="col-md-12">
              <label class="label-control">detalles de la Reserva</label>
              <textarea name="detalle_reserva" class="form-control" rows="2"></textarea>
           </div>
       </div>

        @include('reservas_salas.partials.fields')
        <button type="submit" class="btn btn-success">Reservar</button>
    {!! Form::close() !!}
    <div id="respuesta"></div>

@endsection

