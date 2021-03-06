<div id="panel" class="panel panel-default fondo">
    <div class="panel-heading" style="background-color: rgba(256,256,256,.1);">
          <center> <h3 id="nombre-tabla" class="text-danger text">Mis Reservas de Salas</h3></center>
    </div>
 
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#mis">mis Reservas de Salas</a></li>
      <li><a data-toggle="tab" href="#general">Reservas Salas General</a></li>
    </ul>


<div class="tab-content">
    <!--mis reservas-->
        <div id="mis" class="panel-body tab-pane fade in active">
            <div class="dataTable_wrapper">
                <div class="container-fluid table-responsive">
                    <a class="btn btn-primary pull-right" href="{{ url('/misSalas/create') }}" role="button"><span class="glyphicon glyphicon-plus"></span> Reservas</a>
                    <table class="table table-bordered cell-border table-hover" id="MyTable">
                        <thead>
                            <tr class="active">
                                <th class="text-center">ID</th>
                                <th class="text-center">Elemento</th>
                                <th class="text-center">Beneficiario</th>
                                <th class="text-center">Fecha Reserva</th>
                                <th class="text-center">Hora Inicio</th>
                                <th class="text-center">Hora Final</th>
                                <th class="text-center">Detalle</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservas as $telementos)
                            <tr class="@if($telementos->usuario_id == Auth::user()->id) text-primary @endif
                                        @if($telementos->confirmar == 1) bg-danger @endif">
                                <td class="text-center">{{ $telementos->id }}</td>
                                <td class="text-center">{{ $telementos->elemento}}</td>
                                <td class="text-center">{{ $telementos->nom_user}}</td>
                                <td class="text-center">{{ $telementos->fecha_servicio }}</td>
                                <td class="text-center">{{ $telementos->hora_inicio }}</td>
                                <td class="text-center">{{ $telementos->hora_final }}</td>
                                <td class="text-center">{{ $telementos->detalle_reserva }}</td>
                                    {!! Form::open(['route' => ['misSalas.destroy', $telementos->id], 'method' => 'DELETE']) !!}
                                <td class="text-center">
                                    <button type="submit" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                    <a href="{{ url('/misSalas/'.$telementos->id.'/edit')}}" class="btn btn-info btn-xs">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </a> 
                                </td>
                                    {!! Form::close() !!}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /container-fluit -->
            </div><!-- /datatable-wrapper -->
        </div><!-- /panel panel-body -->


    <!--todas las reservas-->
    <div id="general" class="panel-body tab-pane fade">
        <div class="dataTable_wrapper">
            <div class="container-fluid table-responsive">
                <table class="table table-bordered cell-border table-hover" id="tabla2">
                    <thead>
                        <tr class="active">
                            <th class="text-center">ID</th>
                            <th class="text-center">Elemento</th>
                            <th class="text-center">Beneficiario</th>
                            <th class="text-center">Fecha Reserva</th>
                            <th class="text-center">Hora Inicio</th>
                            <th class="text-center">Hora Final</th>
                            <th class="text-center">Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($generales as $telementos2)
                        <tr class="@if($telementos2->usuario_id == Auth::user()->id) text-primary @endif
                                    @if($telementos2->confirmar == 1) bg-danger @endif">
                            <td class="text-center">{{ $telementos2->id }}</td>
                            <td class="text-center">{{ $telementos2->elemento}}</td>
                            <td class="text-center">{{ $telementos2->nom_user}}</td>
                            <td class="text-center">{{ $telementos2->fecha_servicio }}</td>
                            <td class="text-center">{{ $telementos2->hora_inicio }}</td>
                            <td class="text-center">{{ $telementos2->hora_final }}</td>
                            <td class="text-center">{{ $telementos2->detalle_reserva }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /container-fluit -->
          </div><!-- /datatable-wrapper -->
      </div><!-- /panel panel-body -->
    </div><!-- /panel panel-default -->
</div>
<br><br><br>