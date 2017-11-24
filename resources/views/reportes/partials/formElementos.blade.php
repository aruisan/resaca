<form  id="form_graficar_fecha" class="navbar-form" id="form-create-dueno" role="form">
        <center>
            <input type="hidden" id="reporte_elementos" value="elementos">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-o fa-fw" ></i> Inicial</span>
                <input type="date" class="form-control" id="ff_inicio_elementos" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-o fa-fw"></i> Final</span>
                <input type="date" class="form-control" id="ff_final_elementos" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>
            <button type="button" class="btn btn-primary searchFecha_elementos" ><i class="fa fa-search fa-fw"></i>  Buscar</button>
        </center>
    </form>



    <div id="grafica_fecha_elementos" class="ocultar">
        <div id="chart3_elementos"></div>
        <div class="col-xs-hidden col-sm-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
            <button target="bar" type="button" class="bar_elementos btn btn-success">
                <span class="fa fa-bar-chart"></span>
                Gráfica de barras
            </button>
            <button target="pie" class="pie_elementos btn btn-success">
                <span class="fa fa-pie-chart"></span>
                Gráfica circular o de tarta
            </button>
            <button target="donut" class="donut_elementos btn btn-success">
                <span class="fa fa-circle-o-notch"></span>
                Gráfica de rosca
            </button>
        </div>
    </div>
    <div id="resp_fecha_elementos" class="ocultar"></div>