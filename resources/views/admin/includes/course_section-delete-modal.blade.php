<script>
    $(document).ready(function () {
    $(document).on('click', '.deletebtn', function()
    {
     var pid = $(this).val();
     $('#deletemodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-course_section/"+pid,
         success: function (response) {
            $('#deleteid').val(pid) 
         }
     });
    });
});
</script>