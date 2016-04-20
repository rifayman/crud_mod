<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="application/javascript">

    jQuery(document).ready(function($) {
        uploadFile = function(dat){
            var id = dat.replace('-file', '');
            $.fancybox({
                width		: 950,
                height	    : 500,
                type		: 'iframe',
                href        : "{{ url('admin/filemanager/dialog') }}?type=featured&appendId="+id,
                fitToView   : false,
                autoScale   : false,
                autoSize    : false
            });
        };


        OnMessage = function(data){
            console.log(data);
            var patt = /([a-z\-_0-9\/\:\.]*\.(jpg|jpeg|png|gif|bmp))/i;
            if(patt.test(data.thumb)){
                $("#"+data.appendId+"-text").val(data.thumb);
                $("#"+data.appendId).attr({ 'src' : data.thumb});
                $("#"+data.appendId).removeClass('hide');
                $.fancybox.close();
            }
        };
    });

</script>