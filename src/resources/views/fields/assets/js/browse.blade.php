<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="application/javascript">

    jQuery(document).ready(function($) {
        uploadFile = function(dat){
            $.fancybox({
                width		: 950,
                height	    : 500,
                type		: 'iframe',
                href        : "http://demo.starter.on/admin/filemanager/dialog?type=featured",
                fitToView   : false,
                autoScale   : false,
                autoSize    : false
            });
        };


        OnMessage = function(data){
            console.log(data);
            var patt = /([a-z\-_0-9\/\:\.]*\.(jpg|jpeg|png|gif|bmp))/i;
            if(patt.test(data.thumb)){
                $("#{{ $field['name'] }}-text").val(data.thumb);
                $("#{{ $field['name'] }}").attr({ 'src' : data.thumb});
                $.fancybox.close();
            }
        };
    });

</script>