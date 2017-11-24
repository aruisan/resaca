<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
        {!!Html::style("css/select2.min.css")!!}
        {!!Html::style("css/bootstrap.min.css")!!}
        {!!Html::style("css/dataTables.bootstrap.min.css")!!}
        {!!Html::style("css/responsive.bootstrap.min.css")!!}
        {!!Html::style("css/font-awesome.min.css")!!}
        {!!Html::style("css/sb-admin-2.css")!!}
        {!!Html::style("css/stilo.css")!!}
        {!!Html::style("timepicker/jquery.timepicker.css")!!}
        {!!Html::style("timepicker/bootstrap-datepicker.css")!!}
        {!!Html::style("timepicker/site.css")!!}


</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".menu-responsive">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" id="titulo">Reservas de Salas Académicas</a>
            </div>
           
<div class="collapse navbar-collapse menu-responsive" id="usuario">
            <ul class="nav navbar-top-links navbar-right">
                 <li>
                    <a href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-reply"></i>
                    </a>
                </li>
                    </ul>
                </li>
            </ul>
</div>

     </nav>

        <div id="page-wrapper_user">
            @yield('content')
        </div>

    </div>

    <footer>
        <h4>© 2016 RYCA <a href="">ITFIP </a> <a href="">developers</a></h4>
    </footer>
     {!!Html::script("js/jquery.js")!!}
    {!! Html::script("js/select2.min.js") !!}
    {!!Html::script("js/bootstrap.min.js")!!}
    {!! Html::script("js/jquery.dataTables.min.js") !!}
    {!! Html::script("js/dataTables.responsive.min.js") !!}
    {!! Html::script("js/dataTables.bootstrap.min.js") !!}

    {!! Html::script("timepicker/jquery.timepicker.min.js") !!}
    {!! Html::script("timepicker/bootstrap-datepicker.js") !!}
    {!! Html::script("timepicker/site.js") !!}
    {!! Html::script("timepicker/bootstrap-datepicker.es.min.js") !!}
    {!! Html::script("js/myjs.js")!!} 
   
</body>

</html>
