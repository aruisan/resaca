<div class="modal fade" id="infoReservas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="exampleModalLabel">Informacion de las Reservas</h4>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img src="{{ asset('/imagenes/tuto1.png') }}" style="max-width: 100%;" class="img-responsiv img-rounded">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img src="{{ asset('/imagenes/tuto2.png') }}" style="max-width: 100%;" class="img-responsiv img-rounded">
          </div>
      </div>

      <hr />
      <hr />

        <div class="row" style="margin-top: 10px;">
          <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
          <div class="panel-group col-xs-10 col-sm-10 col-md-8 col-lg-8" id="accordion" role="tablist" aria-multiselectable="true">

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                   1. Navegacion de Titulos
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <p class="text-justify">
                    <h3>encuentras dos opciones</h3>
                    ◄ mis reservas <br>  
                    ◄ reservas generales <br> 
                  </p>
                  <p class="text-justify">
                    <h4>mis reservas:</h4>
                    <span>en esta seccion podra mirar todas las reservaciones hechas a su nombre, podra ver su estado, los datos que suministro al tomar la reserva, editar y eliminar la reserva si el usuario lo desea</span>
                  </p>
                  <p class="text-justify">
                    <h4>reservas generales:</h4>
                    <span>en esta seccion podra mirar todas las reservaciones de todos los usuarios para mayor facilidad al escoger los horarios de las futuras reservas a realizar</span>
                  </p> 
                </div>
              </div>
            </div>


            <div class="panel panel-danger">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    2. fondo rojo en la celda
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  el significado de fondo rojo son las reservas que ya fueron confirmadas por el administrador, dando a entender que el usuario tomo la reserva.
                </div>
              </div>
            </div>


            <div class="panel panel-info">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    3. Opciones
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                  el usuario puede eliminar y editar las reservas, siempre y cuando no se hayan confirmado (o tengan el fondo rojo).
                </div>
              </div>
            </div>

              <div class="panel panel-primary">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFor" aria-expanded="false" aria-controls="collapseFor">
                    4. crear reserva
                  </a>
                </h4>
              </div>
              <div id="collapseFor" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFor">
                <div class="panel-body">
                 los llevara a un formulario donde podra solicitar una reserva llenando los datos exigidos.
                </div>
              </div>
            </div>

        <div class="panel panel-info">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    5. mis reservas
                  </a>
                </h4>
              </div>
              <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">
                  las letras en azul son las reservas pertenecientes al usuario, en la tabla mis reservas no es notorio, en la tabla reservas generales se resaltara sobre las otras reservas con el color de las letras azules.
                </div>
              </div>
            </div>

          </div>
        </div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

