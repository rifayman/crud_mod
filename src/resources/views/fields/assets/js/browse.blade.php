<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="application/javascript">

    jQuery(document).ready(function($) {

        uploadFile = function(url){
            $.fancybox({
                width		: 950,
                height	    : 500,
                type		: 'iframe',
                href        : url,
                fitToView   : false,
                autoScale   : false,
                autoSize    : false
            });
        };

        OnMessage = function(data){
            console.log(data);
            var pattern = /([a-z\-_0-9\/\:\.]*\.(jpg|jpeg|png|gif|bmp))/i;
            if(data.appendId == null){
                if(pattern.test(data.thumb)){
                    var id = data.appendId;
                    var id = id.replace('-text', '');
                    $("#"+id+"-text").val(data.thumb);
                    $("#"+id).attr({ 'src' : data.thumb});
                    $("#"+id).removeClass('hide');
                }
            } else {
                if(pattern.test(data.thumb)){
                    var id = data.appendId;
                    var id = id.replace('-text', '');
                    $("#"+id+"-text").val(data.thumb);
                    $("#"+id).attr({ 'src' : data.thumb});
                    $("#"+id).removeClass('hide');
                } else {
                    $("#"+data.appendId).val(data.thumb);
                }
            }
            $.fancybox.close();
        };
    });

</script>