<script type="text/javascript">

   function readURL(input) {

       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               console.log(reader);
               $('.output').attr('src', e.target.result);
           }

           reader.readAsDataURL(input.files[0]);
       }
   }

   $('.upload_file').change(function(){
       readURL(this);
   });
   
</script>