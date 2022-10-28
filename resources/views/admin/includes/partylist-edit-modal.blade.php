<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editmodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-partylist/"+pid,
         success: function (response) {
            $('#edit-partylist-id').val(pid)
            $('#partylist-edit').val(response.partylists.partylists)
         }
     });
    });
});
 
</script>