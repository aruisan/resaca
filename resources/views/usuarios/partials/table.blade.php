<div id="panel" class="panel panel-default fondo">
    <div class="panel-heading" style="background-color: rgba(256,256,256,.1);">
          <center> <h3 class="text-danger text">Control de Reservas</h3>
    </div>
                        
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <div class="container-fluid table-responsive">
          <a class="btn btn-primary pull-right" href="{{ url('/usuarios/create') }}" role="button"><span class="glyphicon glyphicon-plus"></span> Reservas</a>
            <table class="table table-bordered cell-border table-hover" id="MyTable">
             <thead>
                <tr class="active">
                    <th class="text-center">ID</th>
                    <th class="text-center">Aula</th>
                    <th class="text-center">Beneficiario</th>
                    <th class="text-center">Fecha Reserva</th>
                    <th class="text-center">Hora Inicio</th>
                    <th class="text-center">Hora Final</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
             <tbody>
    @foreach($reservas as $telementos)
                <tr>
                    <td class="text-center">{{ $telementos->id }}</td>
                    <td class="text-center">{{ $telementos->sala }}</td>
                    <td class="text-center">{{ $telementos->nom_user.' '.$telementos->ape_user }}</td>
                    <td class="text-center">{{ $telementos->fecha_servicio }}</td>
                    <td class="text-center">{{ $telementos->hora_inicio }}</td>
                    <td class="text-center">{{ $telementos->hora_final }}</td>
    {!! Form::open(['route' => ['reservas.destroy', $telementos->id], 'method' => 'DELETE']) !!}
                    <td class="text-center">
                        <button type="submit" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <a href="{{ url('/reservas/'.$telementos->id.'/edit') }}" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                    </td>
    {!! Form::close() !!}
                </tr>
    @endforeach
            </tbody>
            <tfoot>
                <tr class="active">
                    <th class="text-center">ID</th>
                    <th class="text-center">Aula</th>
                    <th class="text-center">Beneficiario</th>
                    <th class="text-center">Fecha Reserva</th>
                    <th class="text-center">Hora Inicio</th>
                    <th class="text-center">Hora Final</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </tfoot>
        </table>
            </div><!-- /container-fluit -->
          </div><!-- /datatable-wrapper -->
      </div><!-- /panel panel-body -->
  </div><!-- /panel panel-default -->