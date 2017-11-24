<ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#salas">Reporte de Salas</a></li>
      <li><a data-toggle="tab" href="#elementos">Reportes de Elementos</a></li>
    </ul>


<div class="tab-content">
    <!--mis reservas-->
        <div id="salas" class="panel-body tab-pane fade in active">
            @include('reportes.partials.formSalas');
        </div><!-- /panel panel-body -->


    <!--todas las reservas-->
    <div id="elementos" class="panel-body tab-pane fade">
             @include('reportes.partials.formElementos');
    </div><!-- /panel panel-default -->
</div>


