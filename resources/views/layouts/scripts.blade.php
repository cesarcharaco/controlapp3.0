<script src="{{ asset('assets/js/jquery.js') }}"></script>


<script src="{{ asset('assets/js/app.min.js') }}" ></script>
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>


<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
	$(function () {
		
	$('.carousel').carousel()
	  $('select').each(function () {
	    $(this).select2({
	      theme: 'bootstrap4',
	      width: 'style',
	      placeholder: $(this).attr('placeholder'),
	      allowClear: Boolean($(this).data('allow-clear')),
	    });
	  });
	});
</script>
