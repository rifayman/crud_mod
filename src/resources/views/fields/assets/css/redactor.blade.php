<!-- include summernote css-->
<?php
	$assets_url = config('infinety-crud.assets_folder', 'admin_theme');
?>
<link href="{{ asset($assets_url.'/assets/plugins/redactor/redactor.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" type="text/css" media="screen" />