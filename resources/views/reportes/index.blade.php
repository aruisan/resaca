@extends('admin')

@section('content') 
    @include('reportes.partials.reportes')
@endsection



@section('css')
{!!Html::style("assets/c3/c3.css")!!}
@endsection

@section('js') 
 <script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>
{!!Html::script("assets/c3/c3.js")!!}
    <script type="text/javascript">

        $('.searchFecha_salas').click(function(event){ event.preventDefault();  traerDatosfecha('salas');});
        $('.searchFecha_elementos').click(function(event){ event.preventDefault(); traerDatosfecha('elementos');});

        $('.bar_salas, .pie_salas, .donut_salas').click(function(){ transformChart(this.id); });
         $('.bar_elementos, .pie_elementos, .donut_elementos').click(function(){ var id= $(this).attr('target'); transformChart(id); });

        function transformChart(id)
		{
		    chart.transform(id);
		}
		
        function  traerDatosfecha(reporte)
		{
			var ff_inicio = $('#ff_inicio_'+reporte).val();
			var ff_final = $('#ff_final_'+reporte).val();
			var estado = $('#estado_'+reporte).val();
			var objeto = $('#objeto_'+reporte).val();

		    var url = "/reportes/"+reporte+"/ff_inicio/"+ff_inicio+"/ff_final/"+ff_final+"/estado/"+estado+"/"+reporte+"/"+objeto;
		    //console.log(url);

			$.getJSON(url, function(data)
            {   
		        console.log(data);
		        if(data == 0){
		            $('#grafica_fecha_'+reporte).hide();
		            $('#resp_fecha_'+reporte).show().html('<div class="alert alert-danger text-center">las fechas estan vacias</div>');
		            setTimeout(function(){$('#resp_fecha_'+reporte).hide();  }, 3000);
		        }else if(data == 1){
		            $('#grafica_fecha_'+reporte).hide();
		            $('#resp_fecha_'+reporte).show().html('<div class="alert alert-danger text-center">las fecha Inicio es mayor a la fecha final</div>');
		             setTimeout(function(){$('#resp_fecha_'+reporte).hide();  }, 3000);
		        }else if(data == 2){
		            $('#grafica_fecha_'+reporte).hide();
		            $('#resp_fecha_'+reporte).show().html('<div class="alert alert-danger text-center">no se encontro ningun registro con estas fechas</div>');
		             setTimeout(function(){$('#resp_fecha_'+reporte).hide();  }, 3000);
		        }else{
		            fechaGrafico(data, reporte);
		            $('#grafica_fecha_'+reporte).show();
		        }
		    });
		}

		    function fechaGrafico(datos, reporte)
			{
			    var chartData = [];
			    for (var i=0; i<datos.length; i++) {
			        chartData.push([datos[i]['objeto'], datos[i]['conteo']]);
			    }
			    //console.log(chartData);
			    chart = c3.generate({
			        bindto: "#chart3_"+reporte,
			        data:{
			            type: 'bar',
			            columns: chartData
			        },
			    })
		}
      </script>
@endsection

      