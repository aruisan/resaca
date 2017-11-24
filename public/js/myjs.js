            $(document).ready(function(){
            tablas();
            administrar();
            seleccion();
            calendario();
            exportar();
        });

//--------------------------------datatables---------------------

        function tablas(){
            var titulo = $('#nombre-tabla').text();
             var tabla = $('#MyTable, #tabla2').dataTable
             ({
                responsive: true,
                "order": [[ 0, 'desc' ], [ 1, 'desc' ]],
                dom: 'Bfrtip',
                lengthMenu: [[ 10, 25, 50, -1 ],
                            ['10 rows', '25 rows', '50 rows', 'Show all']],
                buttons:[  

                            {
                                extend: 'pageLength',
                                text:   '<i class="fa fa-filter"></i><span> filtar </span><i class="fa fa-level-down">',
                            },  
                            {
                                extend: 'copyHtml5',
                                text:   '<i class="fa fa-files-o"></i><span> Copiar</span>',
                                title: titulo
                            },
                            {
                                extend: 'csvFlash',
                                text:   '<i class="fa fa-file-o"></i><span> Csv</span>',
                                title: titulo
                            },
                            {
                                extend: 'excelFlash',
                                text:   '<i class="fa fa-file-excel-o"></i><span> Excel</span>',
                                title: titulo
                            },
                            {
                                extend: 'pdfFlash',
                                text:   '<i class="fa fa-file-pdf-o"></i><span> Pdf</span>',
                                title: titulo
                            },
                            {
                                extend: 'print',
                                text:   '<i class="fa fa-print"></i><span> Imprimir</span>',
                                title: titulo
                            },
                        ]
            });
              // Add event listeners to the two range filtering inputs
             
    $('#min').change( function() { tabla.fnDraw(); } );
    $('#max').change( function() { tabla.fnDraw(); } );
            
        }
//--------------------------------------togle de mostrar y ocultar administrar
        function administrar()
        {
            $("#administrar").click(function(event){
                event.preventDefault();
                $("#administrar-oculto").toggle("fast");
            });

             $("#reservas").click(function(event){
                event.preventDefault();
                $("#reservas-oculto").toggle("fast");
            });
        }
//_______________--select dinamico con busqueda_________________________
        function seleccion()
        {       
                $(".select").addClass('selectbootstrap').select2();

                $('.selectbootstrap').selectpicker(
                {
                  style: 'btn-info',
                  size: 4
                });

        }
//-----------------------------calendario dinamico-------------------------
       function calendario()
       {
        $.fn.datepicker.defaults.format = "yyyy/mm/dd";
         $('.calendario').datepicker({
            format: "yyyy/mm/dd",
            language: "es",
            autoclose: true
    });
                    
       }


            

//---------------------------exportar
function exportar()
        {
            
            $("#pdf").click(function(){
                $("#MyTable").tableExport({
                    type: 'pdf',
                    tableName:'reservas',
                    htmlContent:'true',
                    escape: 'false',
                }); 
            });
    
               //------------------------
                $("#csv").click(function(){
                $("#MyTable").tableExport({
                    tableName:'reservas',
                    htmlContent:'true',
                    type: 'csv',
                    escape: 'false',
                }); 
            });
                //------------------------
                $("#excel").click(function(){
                $("#MyTable").tableExport({
                    tableName:'reservas',
                    htmlContent:'true',
                    type: 'excel',
                    escape: 'false',
                }); 
            });
        }
