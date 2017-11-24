
  <div id="panel" class="panel panel-default fondo">
    <div class="panel-heading" style="background-color: rgba(256,256,256,.1);">
          <center> <h3 class="text-danger text" id="nombre-tabla" >Control de Aulas</h3>
    </div>
                        
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <div class="container-fluid table-responsive">
          <a id="nuevo" class="btn btn-primary pull-right" href="{{ url('/salas/create') }}" role="button"><span class="glyphicon glyphicon-plus"></span> Aula</a>
              <table class="table table-bordered cell-border table-hover" id="MyTable">
                <thead>
                  <tr class="active">
                      <th class="text-center">ID</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Aula Ryca</th>
                      <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
        @foreach($salas as $telementos)
                  <tr>
                      <td class="text-center">{{ $telementos->id }}</td>
                      <td class="text-center">{{ $telementos->nombre }}</td>
                      <td class="text-center">{{ $telementos->id_aula_ryca }}</td>
        {!! Form::open(['route' => ['salas.destroy', $telementos->id], 'method' => 'DELETE']) !!}
                      <td class="text-center">
                          <button type="submit" class="btn btn-danger btn-xs">
                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                          </button>
                          <a href="{{ url('/salas/'.$telementos->id.'/edit') }}" class="btn btn-info btn-xs">
                              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                          </a>
                          <a href="{{ url('/ver/elementos/'.$telementos->id) }}" class="btn btn-warning btn-xs">
                              <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
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
  </div><!-- /panel panel-default -->

