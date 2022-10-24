<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editmodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-position/"+pid,
         success: function (response) {
            $('#edit-position-id').val(pid)
            $('#position-edit').val(response.positions.position)
            $('#position-order-edit').val(response.positions.position_order)
         }
     });
    });
});
 
</script>