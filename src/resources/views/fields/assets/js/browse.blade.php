<!-- include browse server js -->
<script src="{{ asset('admin_theme/assets/plugins/colorbox/jquery.colorbox-min.js') }}"></script>
<script>

//    $(document).on('click', '.file_click', function(e){
//        e.preventDefault();
//        var data = $(this).data('inputid');
//        console.log("#"+data);
//        $("#"+data).trigger('click');
//
//
//    });


    function performClick(elemId) {
        var elem = document.getElementById(elemId);
        console.log(elem);
        if(elem && document.createEvent) {
            var evt = document.createEvent("MouseEvents");
            evt.initEvent("click", true, false);
            elem.dispatchEvent(evt);
        }
    }

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(input).parent().find('.output').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.upload-browser').change(function(){
        var to = $(this).data('to');
        $("#"+to).val($(this).val());
    });

</script>