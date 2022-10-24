<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editmodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-college/"+pid,
         success: function (response) {
            $('#edit-college-id').val(pid)
            $('#college-edit').val(response.colleges.colleges)
         }
     });
    });
});
 
</script>