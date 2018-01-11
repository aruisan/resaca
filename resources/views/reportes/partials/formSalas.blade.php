

    <form  id="form_graficar_fecha" class="navbar-form" id="form-create-dueno" role="form">
        <center>
            <div class="row"> 
                <div class="input-group">
                    <span class="input-group-addon"> Salas</span>
                    <select id="objeto_salas" class="form-control">
                        <option value="*">Todas</option>
                        @foreach($salas as $sala)
                        <option value="{{$sala->id  }}">{{ $sala->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"> Estado</span>
                    <select id="estado_salas" class="form-control">
                        <option value="*">Todas</option>
                        <option value="0">Sin Confirmar</option>
                        <option value="1">Confirmadas</option>
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-o fa-fw" ></i> Inicial</span>
                    <input type="date" class="form-control" id="ff_inicio_salas" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar-o fa-fw"></i> Final</span>
                    <input type="date" class="form-control" id="ff_final_salas" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                </div>
            </div><br>
            <button type="button" class="btn btn-primary btn-block searchFecha_salas" ><i class="fa fa-search fa-fw"></i>  Buscar</button>
        </center>
    </form>


    
    <div id="grafica_fecha_salas" class="ocultar">
        <div id="chart3_salas"></div>
        <div class="col-xs-hidden col-sm-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
            <button id="bar" type="button" class="bar_salas btn btn-success">
                <span class="fa fa-bar-chart"></span>
                Gráfica de barras
            </button>
            <button id="pie" class="pie_salas btn btn-success">
                <span class="fa fa-pie-chart"></span>
                Gráfica circular o de tarta
            </button>
            <button id="donut" class="donut_salas btn btn-success">
                <span class="fa fa-circle-o-notch"></span>
                Gráfica de rosca
            </button>
        </div>
    </div>
    <div id="resp_fecha_salas" class="ocultar"></div>