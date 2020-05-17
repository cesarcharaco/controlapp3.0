<!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
<!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
{{-- <script src="{{ asset('assets/js/jquery.js') }}"></script> --}}


<script src="{{ asset('assets/js/app.min.js') }}" ></script>
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>



<script src="{{ asset('assets/js/data-table/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/data-table/data-table-act.js') }}"></script>



<script type="text/javascript">
	var mes = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre',''];
	var f = new Date();
    var a=f.getFullYear();

	$(function () {

		$('.data-table-basic').DataTable({
	        "pageLength": 30,
	        language: {
	        "decimal": "",
	        "emptyTable": "No hay información",
	        "info": "Mostrando la página _PAGE_ de _PAGES_",
	        "infoEmpty": "Mostrando 0 de 0 Entradas",
	        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
	        "infoPostFix": "",
	        "thousands": ",",
	        "lengthMenu": "Mostrar _MENU_ Entradas",
	        "loadingRecords": "Cargando...",
	        "processing": "Procesando...",
	        "search": "Buscar:",
	        "zeroRecords": "Sin resultados encontrados",
	        "paginate": {
	            "first": "Primero",
	            "last": "Ultimo",
	            "next": "Siguiente",
	            "previous": "Anterior"
	          }
	        }

	    });

    
		
		$('.VerEstaciona').carousel();
		$('select').each(function () {
		$(this).select2({
		  theme: 'bootstrap4',
		  width: 'style',
		  placeholder: $(this).attr('placeholder'),
		  allowClear: Boolean($(this).data('allow-clear')),
		});
		});

		$('.carrousel').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 2000,
		});

	});

	function cambiarResiT() {
		var valor = $('#opcionAsignaT').val();
		if (valor==1) {
			$("#campoResidentes").attr('disabled',true);
			$('#opcionAsignaT').val(2);
		}else{
			$("#campoResidentes").removeAttr('disabled');
			$('#opcionAsignaT').val(1);
		}

	}

	function asignar_mr() {
		$.get("multas_recargas/1/buscar_mr_all",function (data) {
	    })
	    .done(function(data) {
	    	console.log(data.length)
	        if (data.length>0) {
	            for (var i = 0; i < data.length; i++) {
	               $("#campoMultaRecarga").append('<option value="'+data[i].id+'"><font style="vertical-align: inherit; color: red">'+data[i].motivo+' - '+ data[i].tipo+' - monto: '+data[i].monto+'$</font></option>');
	            }
	        }else{
	        	$("#campoMultaRecarga").attr('disabled',true);
	        	$("#campoMultaRecarga").append('<option selected disabled><font style="vertical-align: inherit; color: red">No hay multas ni recargas registradas</font></option>');
	        }

	    });	

	    $.get('residentes/1/buscar_residente2',function (data) {
	    })
	    .done(function(data) {
	        if (data.length>0) {
	            for (var i = 0; i < data.length; i++) {
	               $("#campoResidentes").append('<option value="'+data[i].id+'">'+data[i].nombres+' '+data[i].apellidos+' - '+data[i].rut+'</option>');
	            }
	        }else{
	        	$("#campoResidentes").attr('disabled',true);
	        	$("#campoResidentes").append('<option selected disabled><font style="vertical-align: inherit; color: red">No hay residentes registrados</font></option>');
	        }

	    });
	}

	function Profile(){
		// $('#perfil').modal('show');
	}

	function EditarProfile() {
		$('#btnGuardarProfile').fadeIn(300);

		$('#buttonEditP').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#buttonEditP2').fadeIn(300);
		});

		$('#nombres_profile').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#nombres_profileE').fadeIn(300);
		});
		$('#apellidos_profile').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#apellidos_profileE').fadeIn(300);
		});

		$('#rut_profile').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#rut_profileE').fadeIn(300);
		});

		$('#email_profile').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#email_profileE').fadeIn(300);
		});

		$('#telefono_profile').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#telefono_profileE').fadeIn(300);
		});
	}

	function EditarProfile2() {
		$('#btnGuardarProfile').fadeOut('slow');

		$('#buttonEditP2').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#buttonEditP').fadeIn(300);
		});

		$('#nombres_profileE').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#nombres_profile').fadeIn(300);
		});
		$('#apellidos_profileE').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#apellidos_profile').fadeIn(300);
		});

		$('#rut_profileE').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#rut_profile').fadeIn(300);
		});

		$('#email_profileE').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#email_profile').fadeIn(300);
		});

		$('#telefono_profileE').fadeOut('slow',
			function() { 
				$(this).hide();
				$('#telefono_profile').fadeIn(300);
		});

	}


	// function productos(){
	// }

	// function productos2(){
	// 	$('#productos2').fadeOut('slow',
	// 		function() { 
	// 			$(this).hide(); 
	// 			$('#productos').fadeIn(300);
	// 	});
	// }


    

	function EMontos() {

	}

	function EspecificarMontoB(opcion){

		if(opcion ==1){

			$('#muestraMultaMonto').fadeOut('slow',
				function() { 
					$(this).hide();
					$('#muestraEstacionamientoMonto').fadeOut('slow');
					$('#muestraEstacionamientoMonto').hide();

			});
			$('#muestraInmuebleMonto').fadeIn(300);
		}

		if (opcion == 2) {
			$('#muestraInmuebleMonto').fadeOut('slow',
				function() { 
					$(this).hide();
					$('#muestraMultaMonto').fadeOut('slow');
					$('#muestraMultaMonto').hide();

			});
			$('#muestraEstacionamientoMonto').fadeIn(300);
		}

		if (opcion == 3) {
			$('#muestraEstacionamientoMonto').fadeOut('slow',
				function() { 
					$(this).hide();
					$('#muestraInmuebleMonto').fadeOut('slow');
					$('#muestraInmuebleMonto').hide();

			});
			$('#muestraMultaMonto').fadeIn(300);
		}

		
	}
	function PagoC(opcion) {
		

		if (opcion ==1) {
			$('#anioPagoComunI').empty();
			$('#anioPagoComunI').append('<option selected>Seleccione año</option>');
			for (var i = a; i < a+3; i++) {
				$('#anioPagoComunI').append('<option value="'+i+'">'+i+'</option>');
			}
			$('#PagoCInmueble').modal('show');
		}
		if(opcion ==2){
			$('#anioPagoComunE').empty();
			$('#anioPagoComunE').append('<option selected>Seleccione año</option>');
			for (var i = a; i < a+3; i++) {
				$('#anioPagoComunE').append('<option value="'+i+'">'+i+'</option>');
			}
			$('#PagoCEstacionamiento').modal('show');
			$('#PagoCEstaciona').empty();
		}
		if(opcion==3) {
			$('#anioPagoComunI_E').empty();
			$('#anioPagoComunI_E').append('<option selected>Seleccione año</option>');
			for (var i = a; i < a+3; i++) {
				$('#anioPagoComunI_E').append('<option value="'+i+'">'+i+'</option>');
			}
			$('#PagoCInmuebleE').modal('show');
		}
		if(opcion==4){
			$('#anioPagoComunE2').empty();
			$('#anioPagoComunE2').append('<option selected>Seleccione año</option>');
			for (var i = a; i < a+3; i++) {
				$('#anioPagoComunE2').append('<option value="'+i+'">'+i+'</option>');
			}
			$('#PagoCEstacionamiento2').modal('show');
		}
	}

	function montosEstacionaAnio(anio, opcion) {
		$('#editar2').empty();
		$('#spinnerE').css('display','block');
		$('#spinnerE2').css('display','block');
		var id =1;
		$.get('pagoscomunes/1/'+anio+'/buscarPagoC', function(data) {
        		
                $('#PagoCEstaciona1').empty();
                $('#PagoCEstaciona2').empty();
                
                $('#PagoCEstaciona1').append('<label>Montos por mes</label><br>');
                $('#PagoCEstaciona2').append('<label>Montos por mes</label><br>');


                if (opcion == 1) {


	               	if (data.length == 0){


	                    for (var i = 0; i < 12; i++) {
	                    
	                        $('#PagoCEstaciona1').append(
	                            '<div class="row">'+
	                                '<div class="col-md-4">'+
	                                    '<div class="form-group">'+
	                                        '<input type="hidden" name="mes[]" class="form-control-plaintext">'+
	                                        '<label>'+mes[i]+'</label>'+
	                                    '</div>'+
	                                '</div>'+
	                                '<div class="col-md-6">'+
	                                    '<div class="form-group">'+
	                                        '<div class="input-group mb-2">'+
	                                            '<div class="input-group-prepend">'+
	                                                '<div class="input-group-text">$</div>'+
	                                            '</div>'+
	                                            '<input type="number" name="monto[]" class="form-control" placeholder="10" value="0">'+
	                                        '</div>'+
	                                    '</div>'+
	                                '</div>'+
	                            '</div>'
	                        );
	                    }
	                }else{
	                	$('#PagoCEstaciona1').append('<h3>Ya registros de pago común para este año para este año</h3>');
	                }
                }else{

	               	if (data.length > 0){


	                    for (var i = 0; i < 12; i++) {

	                    	var monto=0;

	                    	if(data[i].monto > 0){
	                    		monto=data[i].monto;
	                    	}else{
	                    		monto=0;
	                    	}
	                    
	                        $('#PagoCEstaciona2').append(
	                            '<div class="row">'+
	                                '<div class="col-md-4">'+
	                                    '<div class="form-group">'+
	                                        '<input type="hidden" name="mes[]" class="form-control-plaintext">'+
	                                        '<label>'+mes[i]+'</label>'+
	                                    '</div>'+
	                                '</div>'+
	                                '<div class="col-md-6">'+
	                                    '<div class="form-group">'+
	                                        '<div class="input-group mb-2">'+
	                                            '<div class="input-group-prepend">'+
	                                                '<div class="input-group-text">$</div>'+
	                                            '</div>'+
	                                            '<input type="number" name="monto[]" class="form-control" placeholder="10" value="'+monto+'">'+
	                                        '</div>'+
	                                    '</div>'+
	                                '</div>'+
	                            '</div>'
	                        );
	                    }
	                }else{
	                	$('#PagoCEstaciona2').append('<h3>¡No hay registros de este año para editar!</h3>');
	                }
                }
            })
		.done(function(data) {
			$('#spinnerE').css('display','none');
			$('#spinnerE2').css('display','none');
		});
	}
	function montosInmuebleAnio(anio,opcion) {
		$('#editar1').empty();
		$('#spinnerI').css('display','block');
		$('#spinnerI2').css('display','block');
		var id =1;

		$.get('pagoscomunes/2/'+anio+'/buscarPagoC', function(data) {
        		
                $('#PagoCInmuebles1').empty();
                $('#PagoCInmuebles2').empty();
                
                $('#PagoCInmuebles1').append('<label>Montos por mes</label><br>');
                $('#PagoCInmuebles2').append('<label>Montos por mes</label><br>');

                if (opcion == 1) {

	               	if (data.length == 0){


	                    for (var i = 0; i < 12; i++) {
	                    
	                        $('#PagoCInmuebles1').append(
	                            '<div class="row">'+
	                                '<div class="col-md-4">'+
	                                    '<div class="form-group">'+
	                                        '<input type="hidden" name="mes[]" class="form-control-plaintext">'+
	                                        '<label>'+mes[i]+'</label>'+
	                                    '</div>'+
	                                '</div>'+
	                                '<div class="col-md-6">'+
	                                    '<div class="form-group">'+
	                                        '<div class="input-group mb-2">'+
	                                            '<div class="input-group-prepend">'+
	                                                '<div class="input-group-text">$</div>'+
	                                            '</div>'+
	                                            '<input type="number" name="monto[]" class="form-control" placeholder="10" value="0">'+
	                                        '</div>'+
	                                    '</div>'+
	                                '</div>'+
	                            '</div>'
	                        );
	                    }
	                }else{
	                	$('#PagoCInmuebles1').append('<h3>Ya registros de pago común para este año para este año</h3>');
	                }
                }else{

	               	if (data.length > 0){


	                    for (var i = 0; i < 12; i++) {
	                    	
	                    	var monto=0;

	                    	if(data[i].monto > 0){
	                    		monto=data[i].monto;
	                    	}else{
	                    		monto=0;
	                    	}
	                        $('#PagoCInmuebles2').append(
	                            '<div class="row">'+
	                                '<div class="col-md-4">'+
	                                    '<div class="form-group">'+
	                                        '<input type="hidden" name="mes[]" class="form-control-plaintext">'+
	                                        '<label>'+mes[i]+'</label>'+
	                                    '</div>'+
	                                '</div>'+
	                                '<div class="col-md-6">'+
	                                    '<div class="form-group">'+
	                                        '<div class="input-group mb-2">'+
	                                            '<div class="input-group-prepend">'+
	                                                '<div class="input-group-text">$</div>'+
	                                            '</div>'+
	                                            '<input type="number" name="monto[]" class="form-control" placeholder="10" value="'+monto+'">'+
	                                        '</div>'+
	                                    '</div>'+
	                                '</div>'+
	                            '</div>'
	                        );
	                    }
	                }else{
	                	$('#PagoCInmuebles2').append('<h3>¡No hay registros de este año para editar!</h3>');
	                }
                }
            })
		.done(function(data) {
			$('#spinnerI').css('display','none');
			$('#spinnerI2').css('display','none');
		});
	}
</script>
