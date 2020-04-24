<!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
<!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
{{-- <script src="{{ asset('assets/js/jquery.js') }}"></script> --}}


<script src="{{ asset('assets/js/app.min.js') }}" ></script>
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
<script type="text/javascript">
	$(function () {
		
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

	

    

	function cambiar() {
		
	}
</script>
