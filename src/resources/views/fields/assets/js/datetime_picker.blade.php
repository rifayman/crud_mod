<script src="{{ asset('admin_theme/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

<script type="text/javascript">
	
	jQuery(document).ready(function($) {

		$.fn.datepicker.defaults.format = "yyyy-mm-dd";
		$('.datepicker').datepicker({
		    weekStart: 1
		});

	});

</script>