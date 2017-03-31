<!-- include select2 js-->
<?php
	$assets_url = config('infinety-crud.assets_folder', 'admin_theme');
?>
<script src="{{ asset($assets_url.'/assets/plugins/js/select2/select2.js') }}"></script>
<script>
	jQuery(document).ready(function($) {
		$('.select2').select2();
	});
</script>