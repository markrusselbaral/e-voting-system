<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editmodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-user/"+pid,
         success: function (response) {
            console.log(response)
            $('#edit-user-id').val(pid)
            $('#name-edit').val(response.user.name)
            $('#email-edit').val(response.user.email)
            $('#roles-edit').val(response.user.role)
         }
     });
    });
});
 
</script>