<?php
	$assets_url = config('infinety-crud.assets_folder', 'admin_theme');
?>

<script src="{{ asset($assets_url.'/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

<script type="text/javascript">
	
	jQuery(document).ready(function($) {

		$.fn.datepicker.defaults.format = "yyyy-mm-dd";
		$('.datepicker').datepicker({
		    weekStart: 1
		});

	});

</script>