<script>
    $(document).ready(function () {
    $(document).on('click', '.deletebtn', function()
    {
     var pid = $(this).val();
     $('#deletemodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-college/"+pid,
         success: function (response) {
            $('#deleteid').val(pid) 
         }
     });
    });
});
</script>