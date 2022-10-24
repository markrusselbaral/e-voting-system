<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editmodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-department/"+pid,
         success: function (response) {
            $('#edit-department-id').val(pid)
            $('#department-edit').val(response.departments.departments)
         }
     });
    });
});
 
</script>