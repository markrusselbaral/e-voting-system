<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editmodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-candidate/"+pid,
         success: function (response) {
            console.log(response.candidates);
            $('#edit-candidate-id').val(pid)
            $('#edit_position').val(response.candidates.position)
            $('#edit_partylist').val(response.candidates.partylist)
            // $('#edit_department').val(response.candidates[0].department)
            // // $('#edit_college').val(response.candidates.college_id)
         }
     });
    });
});
 
</script>





