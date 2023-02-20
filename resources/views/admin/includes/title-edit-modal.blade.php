<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editmodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-title/"+pid,
         success: function (response) {
            $('#edit-title-id').val(pid)
            $('#title-edit').val(response.title.title)
         }
     });
    });
});
 
</script>