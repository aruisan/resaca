@extends('admin')

@section('content')
   {!! Form::open([ 'route' => 'reservas.store', 'method' => 'POST']) !!}
         
         <div class="form-group row">
          

             <div class="col-md-12"> 
                {!! Form::label('aula', 'Escoge el Aula:', ['for' => 'aula'] )!!}                
                    <select name="sala_id" id="sala" class="form-control select">
                @foreach($salas as $result2)
                    <option value="{{ $result2->id }}">{{ $result2->nombre}}</option>
                @endforeach
                    </select>
            </div>
        </div>
        
        <div class="form-group row">      
                <div class="col-md-6">
                    {!! Form::label('fecha', 'Dia de la reserva:', ['for' => 'fecha'] ) !!} 
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="input-group date">
                    <input name="fecha_servicio" id="fecha_servicio" type="text" class="form-control calendario">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                  </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-2">
                        <label class="label-control">hora de inicio</label>
                    <div class="input-group">
                       <input name="hora_inicio" type="submit" class="btn btn-warning form-control hora1" value="00:00"/>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                </div>

                 <div class="col-md-2">
                        <label class="label-control">hora de Finalizacion</label>
                    <div class="input-group">
                       <input name="hora_final" type="submit" class="btn btn-warning  form-control hora2" value="00:00"/>
                       <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                </div>
       </div> 

       <div class="form-group row">
           
              <label class="label-control">detalles de la Reserva</label>
              <textarea nombre="detalle_reserva" class="form-control" rows="2"></textarea>
       </div>

        @include('reservas_salas.partials.fields')
        <button type="submit" class="btn btn-success">Reservar</button>
    {!! Form::close() !!}
@endsection

